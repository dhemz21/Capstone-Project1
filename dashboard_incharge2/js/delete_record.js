function confirmDelete() {
  Swal.fire({
    title: 'Are you sure?',
    text: "You want to delete all attendance records? This operation cannot be undone!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'
  }).then((result) => {
    if (result.isConfirmed) {
      fetch('action/delete-record1.php')
        .then(response => response.text())
        .then(data => {
          Swal.fire(
            'Deleted!',
            'Records have been deleted successfully',
            'success'
          )
          location.reload();
        })
        .catch(error => {
          console.error('Error deleting users:', error)
          Swal.fire(
            'Error!',
            'An error occurred while deleting Records.',
            'error'
          )
        })
    }
  })
}
