@extends('layout.main2')
@section('title','ข้อมูลปริมาณขยะแต่ละประเภท')
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
    <h3 class="text-center">ข้อมูลปริมาณขยะแต่ละประเภท</h3>
    <br>
    <div class="container-fluid px-md-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <br>
                    <div class="container">
                        <canvas id="chart"></canvas>
                    </div>
                </div>
            </div>

            <!-- <div class="col-6 container">
                <br>
                <input type="date" class="form-control radius20"  id="Date"/>
            </div> -->
            <div class="col-6 container">
                <br>
                <select name="bin" class="form-control radius20" id="bin">
                </select>
            </div>
            <div class="col-12 container">
               <br>
                {{-- <button type="button" class="btn btn-outline-info btn-block radius20">ค้นหา</button> --}}
                <br>
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
	let chart = document.getElementById('chart').getContext('2d');
	let barChart = new Chart(chart, {
		type:'bar',
		data:{
			labels:["ขวดพลาสติก", "ขวดแก้ว", "กระป๋อง", "ขยะทั่วไป"],
			datasets:[{
				label:'ถังขยะที่ ?',
				data:[0,0,0,0],
				backgroundColor: ['	rgba(16, 150, 24,1)','	rgba(255, 153, 0,1)','	rgba(220, 57, 18,1)','	rgba(51, 102, 204,1)']
				}]
		},
		options:{
			scales: {
				yAxes: [{
					ticks: {
						max: 100,
						min: 0,
						stepSize: 10
					}
				}]
			},
            legend:{
                display:false,
                position:'right',
            }
            
		}
	});
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


     //โชว์ปริมณขยะในถัง

    db.collection("Bin")
    .onSnapshot(function(querySnapshot) {
       querySnapshot.forEach(function(doc) {
        $('#bin').append('<option  value ="' + doc.id + '">' +'ถังขยะที่ '+doc.data().Bin_number+' '+doc.data().Building_Number + '</option>');
        });
        setInterval(function() {
                db.collection("Bin").doc($( "#bin option:selected" ).val())
                .onSnapshot(function(querySnapshot) {
                        barChart.data.datasets[0].data[0]=querySnapshot.data().Bin_Channel_Plastic;
                        barChart.data.datasets[0].data[1]=querySnapshot.data().Bin_Channel_Glass;
                        barChart.data.datasets[0].data[2]=querySnapshot.data().Bin_Channel_Metal;
                        barChart.data.datasets[0].data[3]=querySnapshot.data().Bin_Channel_General;
                        barChart.update();
                    });
        },1000);
    });
</script>

@endsection