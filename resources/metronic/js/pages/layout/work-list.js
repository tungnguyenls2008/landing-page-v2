'use strict';
// Class definition

var WorkListPage = function() {
    // Private functions

    // demo initializer
    var demo = function() {

        var datatable = $('#kt_datatable_works').KTDatatable({
            data: {
                saveState: {cookie: false},
            },
            layout: {
                class: 'datatable-bordered',
            },
            columns: [
                {
                    field: '#',
                    title: '#',
                    width: 20
                },
                {
                    field: 'Project Name (AR)',
                    title: 'Project Name (AR)',
                    responsive: {
                        visible: 'md',
                        hidden: 'sm'
                    }
                },
                {
                    field: 'Actions',
                    title: 'Actions',
                    autoHide: false,
                    // callback function support for column rendering
                    template: function(row) {
                        return '\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2 edit" data-id="' + row['#'] + '" title="Edit details">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
							</a>\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon delete" data-id="' + row['#'] + '" title="Delete">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
	                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
							</a>\
						';
                    },
                },
            ],
        });

        $('#kt_datatable_works').on("click", ".delete", function (e) {
            e.preventDefault();
            var id=$(this).data('id');
            Swal.fire({
                text: "Are you sure to remove the row?",
                title: "Confirmation",
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Confirm",
                cancelButtonText: "Cancel",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary",
                    cancelButton: "btn font-weight-bold btn-default"
                }
            }).then(function(result) {
                if (result.value) {

                    $(".page-loader").addClass("bg-dark-o-50");
                    $("#kt_body").addClass("page-loading");

                    var sendUri = HOST_URL + "/layout/work-list/"+id ;
                    $.ajax({
                        url: sendUri,
                        method: 'DELETE',
                        complete: function (xhr, status) {
                            if (xhr.status === 200 && xhr.responseText === '1') {
                                Swal.fire({
                                    text: "The operation completed successfully",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Okay",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    text: "Sorry, it seems that some errors have been detected. Please try again.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Close",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
                            }

                            $(".page-loader").removeClass("bg-dark-o-50");
                            $('#kt_body').removeClass("page-loading");
                        }
                    });
                }
            });

        });

        $('#kt_datatable_works').on("click", ".edit", function (e) {
            e.preventDefault();
            var id=$(this).data('id');

            $(".page-loader").addClass("bg-dark-o-50");
            $("#kt_body").addClass("page-loading");

            var sendUri = HOST_URL + "/layout/work-list/"+id ;
            $.ajax({
                url: sendUri,
                method: 'GET',
                complete: function (xhr, status) {
                    if (xhr.status === 200 && xhr.responseJSON.data) {
                        const data = xhr.responseJSON.data;
                        $("#editModal [name=project_name]").val(data.project_name);
                        $("#editModal [name=project_name_ar]").val(data.project_name_ar);
                        $("#editModal [name=order]").val(data.order ?? '');
                        $("#editModal [name=category_id]").val(data.category_id);
                        $("#img_project").attr("src", PUBLIC_PATH + "/images/works/" + data.image);
                        $("#editModal [name=id]").val(data.id);
                        $("#editModal").modal("show");
                    } else {

                    }
                    $(".page-loader").removeClass("bg-dark-o-50");
                    $('#kt_body').removeClass("page-loading");
                }
            });
        });

    };

    return {
        // Public functions
        init: function() {
            // init dmeo
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    WorkListPage.init();
});
