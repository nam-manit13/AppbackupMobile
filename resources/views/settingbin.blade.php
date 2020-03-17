@extends('layout.main2')
@section('title','ตั้งค่าของตัวถังขยะ')
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
  <h3 class="text-center">ตั้งค่าถังขยะ</h3>
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
                <h6 class="root-text-color">เริ่มการตั้งค่าของตัวถังขยะ</h6>

                <div class="block-div">
                    <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-4">
                            <label>ตัวถัง</label>
                        </div>
                        <div class="col-8">
                            <select name="bin" class="form-control radius20" id="bin">
                                <!-- <option value="" disabled selected hidden>เลือกถังขยะ</option> -->
                            </select>
                        </div>
                        {{-- <div class="col-3">
                            <button type="button" class="btn btn-outline-info btn-block radius20">ส่งค่า</button>
                        </div> --}}
                    </div>
                </div>
                <div class="block-div">
                    <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-4">
                            <label>กำหนดปริมาณการเก็บขยะของตัวถัง</label>
                        </div>
                        <div class="col-8">
                            <select name="size" class="form-control radius20" id="size">
                                <option value="" disabled selected hidden>เลือกปริมาณ</option>
                                @for ($i = 1; $i <= 100; $i++)
                            <option value="{{ $i }}">{{ $i }} %</option>
                                @endfor
                            </select>
                        </div>
                        {{-- <div class="col-3">
                            <button type="button" class="btn btn-outline-info btn-block radius20">ส่งค่า</button>
                        </div> --}}
                    </div>
                </div>
                <div class="block-div">
                    <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-4">
                            <label>กำหนดเวลาเปิดเครื่อง</label>
                        </div>
                        <div class="col-8">
                            <input type="time" id="timeOn" class="form-control radius20" />
                        </div>
                        {{-- <div class="col-3">
                            <button type="button" class="btn btn-outline-info btn-block radius20">ส่งค่า</button>
                        </div> --}}
                    </div>
                </div>
                <div class="block-div">
                    <div class="col-12 row" style="margin:10px 0px 10px 0px">
                        <div class="col-4">
                            <label>กำหนดเวลาปิดเครื่อง</label>
                        </div>
                        <div class="col-8">
                            <input type="time" id= "timeOff" class="form-control radius20" />
                        </div>
                        {{-- <div class="col-3">
                            <button type="button" class="btn btn-outline-info btn-block radius20">ส่งค่า</button>
                        </div> --}}
                    </div>
                </div>

                <br>
                <br>
                <button type="button" class="btn btn-outline-primary btn-block radius20" onclick="setting_bin()">บันทึกการตั้งค่า</button>
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

    db.collection("Bin")
    .onSnapshot(function(querySnapshot) {
        $('#bin').empty();
       querySnapshot.forEach(function(doc) {
        $('#bin').append('<option  value ="' + doc.id + '">' +'ถังขยะที่ '+doc.data().Bin_number+' '+doc.data().Building_Number + '</option>');
        });
    });


$('#bin').change(function() {
   db.collection("Bin").doc($("#bin").val()).onSnapshot(function(querySnapshot) {
    db.collection("Bin").doc($("#bin").val())
    .onSnapshot(function(doc) {
        $("#size").val(doc.data().Quantity_of_bin);
        $("#timeOn").val(doc.data().Time_on);
        $("#timeOff").val(doc.data().Time_off);
    });
    });

});
$('#bin').each(function() {
   db.collection("Bin").doc($("#bin").val()).onSnapshot(function(querySnapshot) {
    db.collection("Bin").doc($("#bin").val())
    .onSnapshot(function(doc) {
        $("#size").val(doc.data().Quantity_of_bin);
        $("#timeOn").val(doc.data().Time_on);
        $("#timeOff").val(doc.data().Time_off);
    });
    });

});






    function setting_bin(){
            db.collection("Bin").doc($("#bin").val()).update({
                Quantity_of_bin: $("#size").val(),
                Time_on: $("#timeOn").val(),
                Time_off:$("#timeOff").val()
            })
            .then(function() {
                console.log("Document successfully written!");
                Swal.fire({
                    icon: 'success',
                    title: 'แก้ไขสำเร็จ',
                    showConfirmButton: false,
								    	timer: 1000
                  });
            })
            .catch(function(error) {
                console.error("Error writing document: ", error);
            });
  
    }
</script>
@endsection