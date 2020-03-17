@extends('layout.main2')
@section('title','จัดการบัญชีผู้ใช้')
@section('content')

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

<div class="container" id="div-box">
  <br>
  <br>
  <h3 class="text-center">จัดการบัญชีผู้ใช้</h3>
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
                <h6 class="root-text-color">รายชื่อผู้ใช้งาน</h6>

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
                        <div class="container">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อผู้ใช้</th>
                                    <th scope="col">ชื่อ-นามสกุล</th>
        
                                    <th scope="col">จัดการ</th>
                                  </tr>
                                </thead>
                                <tbody id = "Staff">
                                 
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
                
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

    db.collection("Staff")
    .onSnapshot(function(querySnapshot) {
      $('#Staff').empty();
      var i = 1;
       querySnapshot.forEach(function(doc) {
        $('#Staff').append(
            ' <tr><th scope="row">'+i+'</th>'+
            '<td>'+doc.data().Username+'</td>'+
            '<td>'+doc.data().Full_name+'</td>'+
            '<td><button type="button" class="btn btn-outline-danger btn-block radius20" onclick="del_user(\''+doc.id+'\')">ลบ</button></td></tr>'
            );
            i++;
        });
        });
    function del_user(id){
      console.log(id);
        Swal.fire({
            title: 'คุณแน่ใจไหม?',
            text: "ที่ต้องการลบข้อมูลนี้!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
                db.collection("Staff").doc(id).delete().then(function() {
                  Swal.fire({
                              icon: 'success',
                              title: 'ลบสำเร็จ',
                              showConfirmButton: false,
                                timer: 1000
                            }); 
                  }).catch(function(error) {
                      console.error("Error removing document: ", error);
                  });
            }
          });
       
    }
</script>
@endsection