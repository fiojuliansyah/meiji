<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Profile;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function update(Request $request, $id)
    {
        try {
            $user = Profile::findOrFail($id);

            $validatedData = $request->validate(['nik' => 'required|max:16',
                'birth_place' => 'required|string|max:50',
                'birth_date' => 'required|date',
                'gender' => 'required|in:laki-laki,perempuan',
                'address' => 'required|string',
                'avatar' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            ]);

            $user->nik = $validatedData['nik'];
            $user->birth_place = $validatedData['birth_place'];
            $user->birth_date = $validatedData['birth_date'];
            $user->gender = $validatedData['gender'];
            $user->address = $validatedData['address'];

            if ($request->hasFile('avatar')) {

                if ($user->avatar_public_id) {
                    Cloudinary::destroy($user->avatar_public_id);
                }

                $file = $request->file('avatar');
                $uploadedFile = $file->storeOnCloudinary('avatars');
                $user->avatar_url = $uploadedFile->getSecurePath();
                $user->avatar_public_id = $uploadedFile->getPublicId();
            }

            $user->save();

            return redirect()->back()->with('success', 'Profile updated successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found.');
        } catch (ValidationException $e) {
            $errorMessage = implode(', ', $e->validator->errors()->all());
            return redirect()
                ->back()
                ->with('error', 'Validation failed: ' . $errorMessage)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to update profile: ' . $e->getMessage());
        }
    }

    public function storeDocument(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'type' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf,jpeg,png,jpg|max:10240', // Maksimum 10MB
            'validate_date' => 'nullable|date',
            'name' => 'nullable|string|max:255',
        ]);

        try {
            // Upload file ke Cloudinary dan ambil URL & Public ID
            $file = $request->file('document');
            $uploadedFile = $file->storeOnCloudinary('documents/' . $user->name); // Folder 'documents'

            // Simpan URL dan Public ID
            $fileUrl = $uploadedFile->getSecurePath();
            $filePublicId = $uploadedFile->getPublicId();

            // Contoh penyimpanan data dokumen ke database (jika ada model terkait):

            $document = new Document();
            $document->type = $request->input('type');
            $document->name = $request->input('name');
            $document->validate_date = $request->input('validate_date');
            $document->document_url = $fileUrl;
            $document->document_public_id = $filePublicId;
            $document->user_id = $user->id;

            $document->save();

            // Berhasil upload dan simpan
            return redirect()->back()->with('success', 'Document uploaded successfully!');
        } catch (\Exception $e) {
            // Tangkap error saat upload
            return redirect()
                ->back()
                ->with('error', 'Failed to upload document. Error: ' . $e->getMessage());
        }
    }

    public function destroyDocument($id)
    {
        try {
            $document = Document::findOrFail($id);

            // Hapus file dari Cloudinary
            Cloudinary::destroy($document->document_public_id);

            // Hapus data dokumen dari database
            $document->delete();

            return redirect()->back()->with('success', 'Document deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete document: ' . $e->getMessage());
        }
    }
}
