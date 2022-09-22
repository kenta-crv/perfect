window.addEventListener('InsertedSuccessfully', function(){
    $('.c-contianer-box_4').find('span').html('');
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
    })
});

window.addEventListener('OpenEditAdminInformation', function(){
    $('.editAdminInfo').find('span').html('');
    $('.editAdminInfo').modal('show');
});

window.addEventListener('CloseUpdateModal', function(){
    $('.editAdminInfo').find('span').html('');
    $('.editAdminInfo').find('form')[0].reset();
    $('.editAdminInfo').modal('hide');
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
    })
});

window.addEventListener('ConfirmModal', function(){
  // Swal.fire({
  //   title: 'Do you want to save the changes?',
  //   showDenyButton: true,
  //   showCancelButton: true,
  //   confirmButtonText: 'Save',
  //   denyButtonText: `Don't save`,
  // }).then((result) => {
  //   /* Read more about isConfirmed, isDenied below */
  //   if (result.isConfirmed) {
  //     window.livewire.emit('confirm');
  //     Swal.fire('Thank you', '', 'info')
  //   } else if (result.isDenied) {
  //     Swal.fire('Changes are not saved', '', 'info')
  //   }
  // })
});
