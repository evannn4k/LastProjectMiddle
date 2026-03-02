// Swal.fire({
//     title: "Are you sure?",
//     text: "You won't be able to revert this!",
//     icon: "warning",
//     showCancelButton: true,
//     confirmButtonColor: "#3085d6",
//     cancelButtonColor: "#d33",
//     confirmButtonText: "Yes, delete it!",
// }).then((result) => {
//     if (result.isConfirmed) {
//         Swal.fire({
//             title: "Deleted!",
//             text: "Your file has been deleted.",
//             icon: "success",
//         });
//     }
// });

document.addEventListener("DOMContentLoaded", function () {
    if (
        document.getElementById("main-table") &&
        typeof simpleDatatables.DataTable !== "undefined"
    ) {
        const dataTable = new simpleDatatables.DataTable("#main-table", {
            paging: true,
            perPage: 10,
            perPageSelect: [5, 10, 15, 20, 25],
            sortable: true,
        });
    }
});