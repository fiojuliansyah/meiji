"use strict";
var KTCareersList = (function () {
    var t,
        e,
        n,
        r,
        o = document.getElementById("kt_careers_table"),
        c = () => {
            o.querySelectorAll(
                '[data-kt-career-table-filter="delete_row"]'
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
                            cancelButton:
                                "btn fw-bold btn-active-light-primary",
                        },
                    }).then(function (t) {
                        t.value
                            ? Swal.fire({
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
                                  })
                            : "cancel" === t.dismiss &&
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
                '[data-kt-career-table-toolbar="base"]'
            )),
                (n = document.querySelector(
                    '[data-kt-career-table-toolbar="selected"]'
                )),
                (r = document.querySelector(
                    '[data-kt-career-table-select="selected_count"]'
                ));

            const s = document.querySelector(
                '[data-kt-career-table-select="delete_selected"]'
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
                    text: "Are you sure you want to delete selected careers?",
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
                        let selectedCareerIds = [];
                        c.forEach((checkbox) => {
                            if (
                                checkbox.checked &&
                                checkbox.name === "career_ids[]"
                            ) {
                                selectedCareerIds.push(checkbox.value);
                            }
                        });

                        if (selectedCareerIds.length > 0) {
                            selectedCareerIds.forEach((id) => {
                                const input = document.createElement("input");
                                input.type = "hidden";
                                input.name = "career_ids[]";
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
            c
                ? ((r.innerHTML = l),
                  t.classList.add("d-none"),
                  n.classList.remove("d-none"))
                : (t.classList.remove("d-none"), n.classList.add("d-none"));
    };

    return {
        init: function () {
            o &&
                (o.querySelectorAll("tbody tr").forEach((e) => {
                    const t = e.querySelectorAll("td"),
                        n = moment(t[5].innerHTML, "DD MMM YYYY, LT").format();
                    t[5].setAttribute("data-order", n);
                }),
                (e = $(o).DataTable({
                    info: !1,
                    order: [],
                    columnDefs: [
                        { orderable: !1, targets: 0 },
                        { orderable: !1, targets: 6 },
                    ],
                })).on("draw", function () {
                    l(), c(), a();
                }),
                l(),
                document
                    .querySelector('[data-kt-career-table-filter="search"]')
                    .addEventListener("keyup", function (t) {
                        e.search(t.target.value).draw();
                    }),
                document
                    .querySelector('[data-kt-career-table-filter="reset"]')
                    .addEventListener("click", function () {
                        document
                            .querySelector(
                                '[data-kt-career-table-filter="form"]'
                            )
                            .querySelectorAll("select")
                            .forEach((e) => {
                                $(e).val("").trigger("change");
                            }),
                            e.search("").draw();
                    }),
                c(),
                (() => {
                    const t = document.querySelector(
                            '[data-kt-career-table-filter="form"]'
                        ),
                        n = t.querySelector(
                            '[data-kt-career-table-filter="filter"]'
                        ),
                        r = t.querySelectorAll("select");
                    n.addEventListener("click", function () {
                        var t = "";
                        r.forEach((e, n) => {
                            e.value &&
                                "" !== e.value &&
                                (0 !== n && (t += " "), (t += e.value));
                        }),
                            e.search(t).draw();
                    });
                })());
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTCareersList.init();
});
