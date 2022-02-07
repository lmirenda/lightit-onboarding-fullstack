<x-layout>
    <form id="target" action="destination.html">
        <input type="text" placeholder="Hello there" id="cityName">
        <input type="submit" value="Go">
    </form>

    <script>
        $("#form-id").submit(function() {
            var name =  $('#cityName').val();

            $.ajax({
                url : '/' ,
                data : { name : name}
                type : 'POST',
                dataType : 'json',
                success : function(json) {
                    console.log('success');
                },
                error : function(json , xhr, status) {
                    console.log('error');
                },
                complete : function(json , xhr, status) {

                }
            });
        });
    </script>
</x-layout>