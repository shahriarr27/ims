
<script type="text/javascript">
@if ( Session::get('success', false) )
    iziToast.success({
        position: "topRight",
        title : "",
        message: "{{Session::get('success')}}"
    });
@elseif ( Session::get('error', false) )
    iziToast.error({
        position: "topRight",
        title : "",
        message: "{{Session::get('error')}}"
    });
@elseif ( Session::get('warning', false) )
    iziToast.warning({
        position: "topRight",
        title : "",
        message: "{{Session::get('warning')}}"
    });
@elseif ( Session::get('info', false) )
    iziToast.info({
        position: "topRight",
        title : "",
        message: "{{Session::get('info')}}"
    });
@endif

function successNotify(message) {
    iziToast.success({
        position: "topRight",
        title : "",
        message: message
    });
}
function errorNotify(message) {
    iziToast.error({
        position: "topRight",
        title : "",
        message: message
    });
}
</script>

