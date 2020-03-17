@extends('layout.main2')
@section('title','เพิ่มบัญชีผู้ใช้')
@section('content')

<div class="container" id="div-box">
  <br>
  <br>
  <h3 class="text-center">จัดการเพิ่มบัญชีผู้ใช้</h3>
  <br>
    <div class="container-fluid px-md-5">
      {{-- <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <h2 class="mb-4">เพิ่มบัญชีผู้ใช้</h2>
        </div>
      </div> --}}
      <div class="row">
        <div class="col-12">
          <div class="card">
              <br>
              <div class="container">
                <h6 class="root-text-color">กรอกรายละเอียดผู้ใช้งาน</h6>

                {{-- <div class="block-div">
                  <div class="col-12 row" style="margin:10px 0px 10px 0px">
                    <div class="col-2">
                      <label>รหัสผู้ใช้</label>
                    </div>
                    <div class="col-1">:</div>
                    <div class="col-5">
                      <input type="text" name="user" class="form-control radius20">
                    </div>
                    <div class="col-4">
                      ตัวอักษร A-Z,a-z, ตัวเลข 0-9 เช่น 501
                    </div>
                  </div>
                </div> --}}
                <div class="block-div">
                  <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-2">
                            <label>ชื่อผู้ใช้</label>
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5">
                                <input type="text" name="nameuser" id="username" class="form-control radius20">
                        </div>
                        <div class="col-4">
                          ตัวอักษร A-Z,a-z, ตัวเลข 0-9 ไม่เกิน 20 ตัว
                        </div>
                    </div>
                </div>
                <div class="block-div">
                    <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-2">
                            <label>รหัสผ่าน</label>
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5">
                                <input type="password"  id="password" name="pwd" class="form-control radius20">
                        </div>
                        <div class="col-4">
                          ตัวอักษร A-Z,a-z, ตัวเลข 0-9 ไม่เกิน 12 ตัว
                        </div>
                    </div>
                </div>
                <div class="block-div">
                    <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-2">
                            <label>คำนำหน้าชื่อ</label>
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5">
                          <select name="first" class="form-control radius20" id="first">
                            <option value=""  selected hidden>คำนำหน้าชื่อ</option>
                          </select>
                        </div>
                        <div class="col-4">
                          นาย,นาง,นางสาว
                        </div>
                    </div>
                </div>
                <div class="block-div">
                    <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-2">
                            <label>ชื่อ</label>
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5">
                                <input type="text" name="firstname" id="firstname" class="form-control radius20">
                        </div>
                        <div class="col-4">
                          ตัวอักษร A-Z,a-z,ก-ฮ,สระ,วรรณยุกต์
                        </div>
                    </div>
                </div>
                <div class="block-div">
                    <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-2">
                            <label>นามสกุล</label>
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-5">
                                <input type="text" name="lastname" id="lastname" class="form-control radius20">
                        </div>
                        <div class="col-4">
                          ตัวอักษร A-Z,a-z,ก-ฮ,สระ,วรรณยุกต์
                        </div>
                    </div>
                </div>
                <div class="block-div">
                    <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-2">
                            <label>ประจำอาคาร</label>
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-9">
                          <select name="tower" class="form-control radius20" id="tower">
                            <option value=""selected hidden>เลือกอาคาร</option>
                          </select>
                        </div>
                        {{-- <div class="col-4">
                          ตัวอักษร A-Z,a-z,ก-ฮ,สระ,วรรณยุกต์
                        </div> --}}
                    </div>
                </div>

                <br>
                <button type="button" onclick="addStaff()" class="btn btn-outline-info btn-block radius20">เพิ่มบัญชีผู้ใช้</button>
                <br>
                <br>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-firestore.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


<script>
     var firebaseConfig = {
        apiKey: "AIzaSyBlgB3Up0iQSHwjjeKKv4fVS5nbjeCjHvM",
        authDomain: "fir-db-8d065.firebaseapp.com",
        databaseURL: "https://fir-db-8d065.firebaseio.com",
        projectId: "fir-db-8d065",
        storageBucket: "fir-db-8d065.appspot.com",
        messagingSenderId: "417540815548",
        appId: "1:417540815548:web:6eb2526ba2cc39a68f2eb9",
        measurementId: "G-QZQXP66PJW"
    };
   
    firebase.initializeApp(firebaseConfig);
    var db = firebase.firestore();

    var b1,b2,b3,b4,b5,b6 =false;

    function addStaff(){
           if(($('#username').val().length) < 1 ){
            //  console.log($('#username').val().length);
            Swal.fire('กรุณาป้อนชื้อผู้ใช้');
           }else{ b1 = true;}
              if(($('#password').val().length) < 1 ){
              // console.log($('#password').val().length);
              Swal.fire('กรุณาป้อนรหัสผ่าน');
            }else{ b2 = true;}
          
           console.log($('#first').val().length);
           console.log($('#tower').val().length);
           if(($('#first').val().length) < 1 ){
            Swal.fire('กรุณาป้อนคำนำหน้าชื่อ');
           }else{ b3 = true;}
           if(($('#firstname').val().length) < 1 ){
            //  console.log($('#username').val().length);
            Swal.fire('กรุณาป้อนชื่อ');
           }else{ b4 = true;}
           if(($('#lastname').val().length) < 1 ){
            //  console.log($('#username').val().length);
            Swal.fire('กรุณาป้อนนามสกุล');
           }else{ b5 = true;}
           if(($('#tower').val().length) < 1 ){
            Swal.fire('กรุณาป้อน ประจำอาคาร');
           }else{ b6 = true;}
           if(b1==true&&  b2==true && b3==true&& b4==true &&b5==true&& b6 ==true ) {
            

    

                 console.log('ok');
                  db.collection("Staff").add({
                  Username: $('#username').val(),
                  Password: $('#password').val(),
                  Full_name: $('#first').val()+ ' '+$('#firstname').val() + ' '+ $('#lastname').val(),
                  Building_Staff:$('#tower').val(),
                  Type_Notification:"defualt"
              })
              .then(function(docRef) {
                window.location.replace("/deleteuser");
                  console.log("Document written with ID: ", docRef.id);
              })
              .catch(function(error) {
                  console.error("Error adding document: ", error);
              }); 

              Swal.fire({
                    icon: 'success',
                    title: 'สมัครสำเร็จ',
                    showConfirmButton: false,
								    	timer: 1500
                  })   ;
               } 
        }

var array = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22"];

array.forEach(element => {

    console.log(element);
    $('#tower').append('<option id ="' + element + '">' + element + '</option>');
   
});
var array2 = ["นาย", "นาง", "นางสาว"];

array2.forEach(element2 => {

    console.log(element2);
    $('#first').append('<option id ="' + element2 + '">' + element2 + '</option>');
});




</script>

<style>
    #exampleFormControlSelect1 {
        border-radius: 20px;
    }

    #div-box {
        margin-top: 10%;
        margin-bottom: 10%;
        box-shadow: 5px 5px 5px 5px #ccc;
        padding: 3% 5% 10% 5%;
    }

    h3.text-center {
        color: #343a40;
    }

    .root-text-color {
        color: #343a40;
    }

    .root-text-center {
        text-align: center;
    }

    .block-div {
        border-style: ridge;
        border-width: 1px 0px 0px 0px;
        /* margin-top: 5px; */
    }

    /* #edit {
        display: none;
    } */
    input{
        border-radius: 20px;
    }
    .radius20 {
        border-radius: 20px;
    }
</style>

@endsection