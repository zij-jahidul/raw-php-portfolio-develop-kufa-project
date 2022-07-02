<script type="text/javascript">
$(document).ready(function() {
  $('.delete_btn').click(function(){
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {
  if (result.value) {
    var jiku = $(this).val()
    window.location.href = jiku;
  }
})
  })

} );
</script>
