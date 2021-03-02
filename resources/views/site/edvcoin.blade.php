@extends('layouts.edv')
@section('content')

<div class="container center">
        <div class="text-center mb-5">
            <div class="btn-vertical-group btn-group-toggle " data-toggle="buttons">
                <label class="btn btn-primary active">
                    <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
                </label>
            </div>
        </div>
    
    <video width=300 height=300 id="preview"></video>
    <h1>Total EdvCoins <span class="badge bg-primary text-white">{{$sum}}</span></h1>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Market</th>
              <th scope="col">Spent</th>
              <th scope="col">EdvCoin</th>
              <th scope="col">Time</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($edvcoin as $key => $e)
            <tr>
              <th scope="row">{{$key}}</th>
              <td>{{$e->market}}</td>
              <td>{{$e->spent}} Azn</td>
              <td>{{$e->edvcoin}} EdvCoin</td>
              <td>{{$e->created_at}}</td>
            </tr>
            @endforeach      
          </tbody>
    </table>
</div>

@endsection
@section('js')

<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var baseurl = $('.baseurl').attr('data-url');
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){

    var fiscal = content.substring(46, 58);       

    //var data = '';      
    fetch('https://monitoring.e-kassa.gov.az/pks-portal/1.0.0/documents/'+fiscal)
    .then(res => res.json())
    .then((out) => {
       // console.log('Output: ', out.cheque.storeName);
       var data = {fiscal:fiscal, market:out.cheque.storeName, spent:out.cheque.content.sum, edvcoin:out.cheque.content.vatAmounts[0].vatResult}; 

        $.ajax({
            type: 'post',
            url: baseurl+'/apiaddedvcoin',
            data: {'data':data},
            success: function(response) {
                var len = response.length;
                console.log(response);
                if(response == '300'){
                    Swal.fire('Xeta','Daxil etdiyiniz <b>'+fiscal+'</b> fiscal kodu daha once daxil edilmisdir','error');
                }else{
                    Swal.fire('Ugurlu','Hesabiniza <b>'+response.edvcoin+'</b> EdvCoin elave edildi','success');

                    setTimeout(function(){
                        location.reload();
                    }, 1000);
                }
            },
            error: function(response) {                    
            }
        });       



    }).catch(err => console.error(err));

    






    });
    Instascan.Camera.getCameras().then(function (cameras){
        console.log(cameras);
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    alert('front');
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    alert('back');
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
</script>

@endsection

@section('css')
<style>
</style>
@endsection