@push('js')
@if(session('success'))
<script>
    function alertFloat(align, message, icon) {
        const type = ["info", "danger", "success", "warning", "primary"];

        const color = Math.floor(Math.random() * 6 + 1);

        $.notify({
            icon: icon,
            message: message,
        }, {
            type: 'success',
            timer: 3000,
            placement: {
                from: "top",
                align: align,
            },
        });
    }
</script>

<script>
    //swal("¡Buen trabajo!", "{{session('success')}}", "success");
    alertFloat("right", "¡{{session('success')}}!", "check")
</script>
@endif


@if(session('success-auto-close'))
<script>
    swal({
        title: "¡Buen trabajo!",
        text: "{{session('success-auto-close')}}",
        type: "success",
        timer: 2000,
        button: false,
    });
</script>
@endif


@if (session('error'))
<script>
    swal("¡error!", "{{session('error')}}", "error");
</script>
@endif

@if (session('status'))
<script>
    swal("¡Buen trabajo!", "{{session('status')}}", "success");
</script>
@endif




@endpush