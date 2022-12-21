<script>
    $("#member").DataTable({

    });

    // function umur(id) {
    //     // alert(id);
        
    //     let baseUrl = "<?= base_url() ?>"
    //      await $.ajax({
    //         type: "GET",
    //         url: `${baseUrl}/biodata/detail/${id}`,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         data: data,
    //         success: function(response) {
    //             var data = JSON.parse(response);

    //             // $("#imageEvent").attr('src', `${apiUrl + data.data[0].Media[0].path}`);
    //             // $("#eventDate").html(data.data[0].event_date);
    //             // $("#startEnd").html(data.data[0].start + " - " + data.data[0].end);
    //             // $("#description").html(data.data[0].description);
    //             // $("#location").html(data.data[0].location);
    //             // $("#summary").html(data.data[0].summary);
    //         },
    //         error: function(err) {
    //             toastr.error('something went wrong');
    //         }
    //     });
    // }
    umur = async (id) => {
        // var id =id;
        // alert(id)
        $('#detailEvent').modal('show');
        
        
        let baseUrl="<?= base_url() ?>";
        console.log(baseUrl)
        await $.ajax({
            
            type: "GET",
            url: `${baseUrl}/biodata/detail/${id}`,
            cache: false,
            contentType: false,
            processData: false,
            // data: data,
            success: function(response) {
                var date = new Date();
                // console.log(date)
                var data = JSON.parse(response);
                // console.log(data)
                var yeartgl_lahir= data.data[0].tgl_lahir;
                var news = new Date(yeartgl_lahir);
                var taunlahir = news.getFullYear()
                var datenow = date.getFullYear()
                var umur = datenow-taunlahir
                // console.log(datenow-taunlahir);

                var nama = data.data[0].nama
                var karakter =nama.length
                // console.log(karakter)



                // $("#imageEvent").attr('src', `${apiUrl + data.data[0].Media[0].path}`);
                $("#umur").html(umur);
                $("#jumlah").html(karakter);
                // $("#description").html(data.data[0].description);
                // $("#location").html(data.data[0].location);
                // $("#summary").html(data.data[0].summary);
            },
            error: function(err) {
                toastr.error('something went wrong');
            }
        });
    }
</script>