var KTDocsList = (function () {
  var table = document.getElementById("kt_datatable_example_1");
  var datatable;
  var toolbarBase;
  var toolbarSelected;
  var selectedCount;

  var initDocsTable = function () {

      datatable = $(table).DataTable({
          searchDelay: 500,
          stateSave: true,
          processing: true,
          serverSide: true,
          order: [[5, "asc"]],
          select: {
              style: "multi",
              selector: 'td:first-child input[type="checkbox"]',
              className: "row-selected",
          },
          ajax: {
              data: function () {
                  let datatable = $("#kt_datatable_example_1");
                  let info = datatable.DataTable().page.info();
                  datatable
                      .DataTable()
                      .ajax.url(
                          route +
                              `?page=${info.page + 1}&per_page=${info.length}`
                      );
              },
          },
          columns: [
              { data: "id" },
              { data: "id" },
              { data: "name" },
              { data: "price" },
              { data: "availability" }, // This column needs modification
              { data: null },
          ],
          columnDefs: [
              {
                  targets: 0,
                  orderable: false,
                  render: function (data, type, row) {
                      return `
                          <div class="form-check form-check-sm form-check-custom form-check-solid">
                              <input class="form-check-input" name="item_check"  type="checkbox" value="${data}" />
                          </div>`;
                  },
              },
              {
                  targets: 1,
                  data: null,
                  render: function (data, type, row, meta) {
                      return meta.row + 1;
                  },
              },
              {
                  targets: 4, // Adjust to the correct column index for availability
                  data: "availability",
                  render: function (data, type, row) {

                      return data === 1 ?  translate("Available"): translate("NotAvailable") ;
                  },
              },
              {
                  targets: -1,
                  data: null,
                  orderable: false,
                  className: "text-end",
                  render: function (data, type, row) {
                      const baseUrl =
                          window.location.origin + "/SuperServe/public";
                      const editUrl = `${route}/${row.id}/edit`;
                      const showUrl = `${route}/${row.id}/show`;

                      return `
                          <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                          ${translate("Actions")}
                              <span class="svg-icon svg-icon-5 m-0">
                                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                          <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                          <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                      </g>
                                  </svg>
                              </span>
                          </a>
                          <!--begin::Menu-->
                          <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                  <a href="${editUrl}" class="menu-link px-3 d-flex justify-content-between" data-kt-docs-table-filter="edit_row">
                                      <span>${translate("Edit")}</span>
                                      <span><i class="fa fa-edit text-primary"></i></span>
                                  </a>
                              </div>
                              <!--end::Menu item-->

                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                  <a href="#" class="menu-link px-3 d-flex justify-content-between" data-kt-docs-table-filter="delete_row">
                                      <span>${translate("Delete")}</span>
                                      <span><i class="fa fa-trash text-danger"></i></span>
                                  </a>
                              </div>
                              <!--end::Menu item-->


                          </div>
                          <!--end::Menu-->


                      `;
                  },
              },
          ],
          createdRow: function (row, data, dataIndex) {
              $(row).find("td:eq(1)").attr("data-filter", data.image);
          },
      });

      datatable.on("draw", function () {
          initToggleToolbar();
          handleDeleteRows();
          toggleToolbars();
          KTMenu.createInstances();
      });
  };

  var handleSearchDatatable = () => {
      const filterSearch = document.querySelector(
          '[data-kt-docs-table-filter="search"]'
      );
      filterSearch.addEventListener("keyup", function (e) {
          datatable.search(e.target.value).draw();
      });
  };

  var handleFilterDatatable = () => {
      const filterForm = document.querySelector(
          '[data-kt-docs-table-filter="form"]'
      );
      const filterButton = filterForm.querySelector(
          '[data-kt-docs-table-filter="filter"]'
      );
      const selectOptions = filterForm.querySelectorAll("select");

      filterButton.addEventListener("click", function () {
          var filterString = "";

          selectOptions.forEach((item, index) => {
              if (item.value && item.value !== "") {
                  if (index !== 0) {
                      filterString += " ";
                  }

                  filterString += item.value;
              }
          });
          datatable.search(filterString).draw();
      });
  };

  var handleResetForm = () => {
      const resetButton = document.querySelector(
          '[data-kt-docs-table-filter="reset"]'
      );

      resetButton.addEventListener("click", function () {
          const filterForm = document.querySelector(
              '[data-kt-docs-table-filter="form"]'
          );
          const selectOptions = filterForm.querySelectorAll("select");

          selectOptions.forEach((select) => {
              $(select).val("").trigger("change");
          });

          datatable.search("").draw();
      });
  };

  var handleDeleteRows = () => {
      const deleteButtons = table.querySelectorAll(
          '[data-kt-docs-table-filter="delete_row"]'
      );

      if (deleteButtons) {
          deleteButtons.forEach((d) => {
              d.addEventListener("click", function (e) {
                  e.preventDefault();
                  const parent = e.target.closest("tr");

                  const customerName =
                      parent.querySelectorAll("td")[2].innerText;
                  const customerId =
                      parent.querySelectorAll("td div input")[0].value;

                  Swal.fire({
                      text:
                          "Are you sure you want to delete " +
                          customerName +
                          "?",
                      icon: "warning",
                      showCancelButton: true,
                      buttonsStyling: false,
                      confirmButtonText: "Yes, delete!",
                      cancelButtonText: "No, cancel",
                      customClass: {
                          confirmButton: "btn fw-bold btn-danger",
                          cancelButton:
                              "btn fw-bold btn-active-light-primary",
                      },
                  }).then(function (result) {
                      if (result.value) {
                          $.ajax({
                              method: "POST",
                              headers: {
                                  "X-CSRF-TOKEN": $(
                                      'meta[name="csrf-token"]'
                                  ).attr("content"),
                              },
                              url: route + "/" + customerId,
                              data: {
                                  _token: csrfToken,
                                  _method: "DELETE",
                              },
                              success: function () {
                                  Swal.fire({
                                      text: customerName + " has been deleted!",
                                      icon: "success",
                                      buttonsStyling: false,
                                      confirmButtonText: "Ok",
                                      customClass: {
                                          confirmButton:
                                              "btn fw-bold btn-primary",
                                      },
                                  }).then(function () {
                                      datatable.ajax.reload();
                                  });
                              },
                              error: function () {
                                  Swal.fire({
                                      text: "Something went wrong!",
                                      icon: "error",
                                      buttonsStyling: false,
                                      confirmButtonText: "Ok",
                                      customClass: {
                                          confirmButton:
                                              "btn fw-bold btn-primary",
                                      },
                                  });
                              },
                          });
                      }
                  });
              });
          });
      }
  };

  var initToggleToolbar = () => {
      const checkAll = document.querySelector(
          '[data-kt-docs-table-filter="check_all"]'
      );
      const checkboxes = document.querySelectorAll(
          '[data-kt-docs-table-filter="check_row"]'
      );

      if (checkAll) {
          checkAll.addEventListener("click", function () {
              const isChecked = checkAll.checked;
              checkboxes.forEach((checkbox) => {
                  checkbox.checked = isChecked;
                  $(checkbox).closest("tr").toggleClass("row-selected", isChecked);
              });

              updateToolbar();
          });
      }

      if (checkboxes) {
          checkboxes.forEach((checkbox) => {
              checkbox.addEventListener("click", function () {
                  $(checkbox).closest("tr").toggleClass("row-selected");
                  updateToolbar();
              });
          });
      }
  };

  var updateToolbar = () => {
      const selectedCheckboxes = table.querySelectorAll(
          '[data-kt-docs-table-filter="check_row"]:checked'
      );
      const isAnyCheckboxChecked = selectedCheckboxes.length > 0;

      if (toolbarBase) {
          toolbarBase.classList.toggle("d-none", isAnyCheckboxChecked);
      }

      if (toolbarSelected) {
          toolbarSelected.classList.toggle("d-none", !isAnyCheckboxChecked);
          selectedCount.innerHTML = selectedCheckboxes.length;
      }
  };

  var toggleToolbars = () => {
      const checkboxes = table.querySelectorAll(
          '[data-kt-docs-table-filter="check_row"]'
      );

      checkboxes.forEach((checkbox) => {
          checkbox.addEventListener("click", function () {
              updateToolbar();
          });
      });
  };

  // Public methods
  return {
      init: function () {
          if (!table) {
              return;
          }

          toolbarBase = document.querySelector(
              '[data-kt-docs-table-toolbar="base"]'
          );
          toolbarSelected = document.querySelector(
              '[data-kt-docs-table-toolbar="selected"]'
          );
          selectedCount = document.querySelector(
              '[data-kt-docs-table-select="selected_count"]'
          );

          initDocsTable();
          handleSearchDatatable();
          handleFilterDatatable();
          handleResetForm();
      },
  };
})();

KTUtil.onDOMContentLoaded(function () {
  KTDocsList.init();
});
