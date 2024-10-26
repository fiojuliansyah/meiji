"use strict";
var KTStatusesList = (function () {
    var t,
        e,
        n,
        r,
        o = document.getElementById("kt_statuses_table"),
        c = () => {
            o.querySelectorAll(
                '[data-kt-status-table-filter="delete_row"]'
            ).forEach((t) => {
                t.addEventListener("click", function (t) {
                    t.preventDefault();
                    const n = t.target.closest("tr"),
                        r = n.querySelectorAll("td")[1].innerText;
                    Swal.fire({
                        text: "Are you sure you want to delete " + r + "?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary",
                        },
                    }).then(function (t) {
                        t.value ?
                            Swal.fire({
                                text: "You have deleted " + r + "!",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                },
                            })
                            .then(function () {
                                e.row($(n)).remove().draw();
                            })
                            .then(function () {
                                a();
                            }) :
                            "cancel" === t.dismiss &&
                            Swal.fire({
                                text: r + " was not deleted.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                },
                            });
                    });
                });
            });
        },
        l = () => {
            const c = o.querySelectorAll('[type="checkbox"]');
            (t = document.querySelector(
                '[data-kt-status-table-toolbar="base"]'
            )),
            (n = document.querySelector(
                '[data-kt-status-table-toolbar="selected"]'
            )),
            (r = document.querySelector(
                '[data-kt-status-table-select="selected_count"]'
            ));

            const s = document.querySelector(
                '[data-kt-status-table-select="delete_selected"]'
            );
            const bulkDeleteForm = document.getElementById("bulk-delete-form");

            c.forEach((e) => {
                e.addEventListener("click", function () {
                    setTimeout(function () {
                        a();
                    }, 50);
                });
            });

            s.addEventListener("click", function () {
                Swal.fire({
                    text: "Are you sure you want to delete selected statuses?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function (t) {
                    if (t.value) {
                        let selectedstatusIds = [];
                        c.forEach((checkbox) => {
                            if (
                                checkbox.checked &&
                                checkbox.name === "status_ids[]"
                            ) {
                                selectedstatusIds.push(checkbox.value);
                            }
                        });

                        if (selectedstatusIds.length > 0) {
                            selectedstatusIds.forEach((id) => {
                                const input = document.createElement("input");
                                input.type = "hidden";
                                input.name = "status_ids[]";
                                input.value = id;
                                bulkDeleteForm.appendChild(input);
                            });

                            bulkDeleteForm.submit();
                        }
                    }
                });
            });
        };

    const a = () => {
        const e = o.querySelectorAll('tbody [type="checkbox"]');
        let c = !1,
            l = 0;
        e.forEach((e) => {
                e.checked && ((c = !0), l++);
            }),
            c ?
            ((r.innerHTML = l),
                t.classList.add("d-none"),
                n.classList.remove("d-none")) :
            (t.classList.remove("d-none"), n.classList.add("d-none"));
    };
    return {
        init: function () {
            if (o) {
                o.querySelectorAll("tbody tr").forEach((e) => {});

                const e = $(o).DataTable({
                    info: false,
                    order: [],
                    columnDefs: [{
                            orderable: false,
                            targets: 0
                        },
                        {
                            orderable: false,
                            targets: 3
                        },
                    ],
                });

                e.on("draw", function () {
                    l(), c(), a();
                });

                l();

                document
                    .querySelector(
                        '[data-kt-status-table-filter="search"]'
                    )
                    .addEventListener("keyup", function (t) {
                        const searchValue = t.target.value.trim();
                        e.search(searchValue, true, false).draw(); // Menggunakan pencarian regex
                    });

                c();
            }
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTStatusesList.init();
});
