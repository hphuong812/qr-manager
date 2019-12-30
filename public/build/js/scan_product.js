// Setup QR scanner
var totalPayment = 0;
var id_product=[];
var quantity_product=1;
let scanner = new Instascan.Scanner({ video: document.getElementById('video-scan-qr') });

$('#video-scan-qr').click(() =>{
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
})


$('#btn-checkout').click(e =>{
    if (totalPayment == '0') {
        swal('Lỗi',"số tiền phải lớn hơn 0", 'error')
    }else{
    scanner.stop().then(async e =>{
        // let stream = await navigator.mediaDevices.getUserMedia({ video: true });
    //    $("#video-scan-face").get(0).srcObject = stream;
        
       
    })
    $.ajax({
        url:'http://192.168.61.27:8000/',
        method: 'POST',
        data: {
            id: '2',
            money: totalPayment,
        },
        success:data=> {
            window.open("http://192.168.61.27:8000/"+data, '_blank', 'location=yes,height=450,width=1300,scrollbars=yes,status=yes');
            location.reload();z
        }
    });
            
}
});

scanner.addListener('scan', function (content) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: 'scan-qr',
        data: { QRcode: content },
        success: function (result) {
            if (id_product.indexOf(result.id)==-1) {
                $('tbody').append(
                    `<tr>
                        <td><input type="checkbox" class="checkbox" name="check[]"></td>
                        <td><img  id="img-avatar" style="width: 50px;" src="dist/img/`+ result.img + `" alt=""></td>
                        <td>`+ result.product_name + `</td>
                        <td>`+ result.price + `</td>
                        <td>
                            <div class="def-number-input number-input safari_only">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown();"
                                    class="minus"></button>
                                <input class="quantity" id="`+result.id+`" min="0" name="quantity" value="1" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                    class="plus"></button>
                            </div>
                        </td>
                    </tr>`
                );
                $('#imgProduct').attr('src', 'dist/img/' + result.img + '');
                id_product.push(result.id);
            }else{
                var check_quantity = $('#'+result.id).val();
                quantity_product= 1 + Number(check_quantity);
                $('#'+result.id).attr('value', quantity_product);
                $('#imgProduct').attr('src', 'dist/img/' + result.img + '');
            }
            totalPayment = totalPayment + result.price;
            $('.price').text(totalPayment.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ' đ');
        }
    });
});


//function select in table
$("#select_all").change(function () {  
var status = this.checked; 
$('.checkbox').each(function () {
    this.checked = status;
});
});

$('.checkbox').change(function () { 
if (this.checked == false) {
    $("#select_all")[0].checked = false;
}
if ($('.checkbox:checked').length == $('.checkbox').length) {
    $("#select_all")[0].checked = true;
}
});


