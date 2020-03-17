@extends('layout.main2')
@section('title','จัดการถังขยะ')
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
  <h3 class="text-center">จัดการถังขยะ</h3>
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
                <h6 class="root-text-color">กรอกรายละเอียดถังขยะ</h6>

                <div class="block-div">
                    <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-3">
                            <label>หมายเลขถัง</label>
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-8">
                        <input type="number" id="Bin_number" name="idbin" class="form-control radius20" value="1">
                        </div>
                        
                    </div>
                </div>
                <div class="block-div">
                    <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-3">
                            <label>ตำแหน่งที่อยู่</label>
                            <label>(ละติจูด,ลองจิจูด)</label>
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-8">
                        <input type="text" id="Location" name="addressbin" class="form-control radius20" value="17.286296, 104.107148">
                        </div>
                        {{-- <div class="col-4">
                          ตัวอักษร A-Z,a-z,ก-ฮ,สระ,วรรณยุกต์
                        </div> --}}
                    </div>
                </div>
                <div class="block-div">
                    <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-3">
                            <label>หมายเลขอาคาร</label>
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-8">
                        <input type="text" id="Building_Number" name="numbin" class="form-control radius20" value="อาคาร 1">
                        </div>
                        {{-- <div class="col-4">
                          ตัวอักษร A-Z,a-z,ก-ฮ,สระ,วรรณยุกต์
                        </div> --}}
                    </div>
                </div>
                <div class="block-div">
                    <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-3">
                            <label>ผู้ดูแลถังขยะ</label>
                        </div>
                        <div class="col-1">:</div>
                        <div class="col-8">
                        <select name="Staff" class="form-control radius20" id="Staff"></select>
                        </div>
                        {{-- <div class="col-4">
                          ตัวอักษร A-Z,a-z,ก-ฮ,สระ,วรรณยุกต์
                        </div> --}}
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-outline-info btn-block radius20" onclick="addBin_na()">เพิ่มข้อมูลถังขยะ</button>
                <br>
                <br>
                
              </div>
            </div>
          </div>
      </div>
    </div>
</div>

<div class="container" id="div-box">
    <br>
    <br>
    <h3 class="text-center">ข้อมูลของถังขยะ</h3>
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
                        <h6 class="root-text-color">รายละเอียดถังขยะ</h6>
                        <div class="block-div">
                            <div class="col-12 row" style="margin:10px 0px 10px 0px">
                                <div class="container">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">รหัสถังขยะ</th>
                                            <th scope="col">ที่อยู่ถังขยะ</th>
                                            <th scope="col">หมายเลขถัง</th>
                                            <th scope="col">จัดการ</th>
                                          </tr>
                                        </thead>
                                        <tbody id="showbin">
                                          
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
       querySnapshot.forEach(function(doc) {
        $('#Staff').append('<option  value ="' + doc.id + '">' +''+doc.data().Full_name + '</option>');
        });
        });
  console.log("kfgjdhkgusfhdjkghsfjlk;g");
function addbin_nn() {
  console.log("onnnnnnnnnn");
}
function addBin_na() {
  db.collection("Bin").add({
                  Bin_Channel_General:0,
                  Bin_Channel_Glass:0,
                  Bin_Channel_Metal:0,
                  Bin_Channel_Plastic:0,
                  Bin_number:$('#Bin_number').val(),
                  Building_Number:$('#Building_Number').val(),
                  Location:$('#Location').val(),
                  Quantity_of_bin:"90",
                  Staff:$(  "#Staff option:selected" ).val(),
                  Time_off:"00:00:00",
                  Time_on:"00:00:00"
              })
              .then(function(docRef) {
                  console.log("Document written with ID: ", docRef.id);
              })
              .catch(function(error) {
                  console.error("Error adding document: ", error);
              }); 

                  $('#showbin').empty(); 
              Swal.fire({
                    icon: 'success',
                    title: 'บันทึกสำเร็จ',
                    showConfirmButton: false,
								    	timer: 1000
                  });
                  
}

function  del_bin(params) { //ลบถังออก
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
      db.collection("Bin").doc(params).delete().then(function() {
        Swal.fire({
                    icon: 'success',
                    title: 'ลบสำเร็จ',
                    showConfirmButton: false,
								    	timer: 1000
                  }); 
                  // window.location.replace("/addbin");
        }).catch(function(error) {
            console.error("Error removing document: ", error);
        });
  }
});
}


  db.collection("Bin")   //โชว์ถัง
      .onSnapshot(function(querySnapshot) {
        var i =1 
        $('#showbin').empty();
        querySnapshot.forEach(function(doc) {
          $('#showbin').append(
            ' <tr><th scope="row">'+i+'</th>'+
            '<td>'+doc.id+'</td>'+
            '<td>'+doc.data().Building_Number+'</td>'+
            ' <td>'+doc.data().Bin_number+'</td>'+
            '<td><button type="button" class="btn btn-outline-danger btn-block radius20" onclick="del_bin(\''+doc.id+'\')">ลบ</button></td></tr>'
            );
          i+=1
          });
      });

                               
</script>

@endsection