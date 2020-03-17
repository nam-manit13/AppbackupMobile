@extends('layout.main2')
@section('title','รายงานข้อมูลปริมาณขยะรีไซเคิลที่ได้ตามเวลา')
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
    <h3 class="text-center">รายงานข้อมูลปริมาณขยะรีไซเคิลที่ได้ตามเวลา</h3>
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
            <div class="col-6 container">
                <br>
                <input type="date" class="form-control radius20" id="Date"/>
            </div>
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
			labels:["เช้า (08:00-11:59 น.)", "กลางวัน (12:00-17:59 น.)", "เย็น (18:00-23:59 น.)"],
			datasets:[{
				label:'รายงานขยะ',
				data:[0,0,0],
				backgroundColor:['grey','green','red'],
                
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
                label:{
                    fontColor:'#000'
                }
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


     //โชวถัง
    var sum1 =0;
    var sum2 =0;
    var sum3 =0;

    var average1 =0;
    var average2 =0;
    var average3 =0;

    db.collection("Bin")
    .onSnapshot(function(querySnapshot) {
       querySnapshot.forEach(function(doc) {
        $('#bin').append('<option  value ="' + doc.id + '">' +'ถังขยะที่ '+doc.data().Bin_number+' '+doc.data().Building_Number + '</option>');
        });

        db.collection("Data_Garbage").orderBy("Date", "desc").limit(1).onSnapshot(function(querySnapshot) {
               querySnapshot.forEach(function(doc) {
                  console.log(doc.data().Date);
                  document.getElementById("Date").value =doc.data().Date;
               });
        });

        setInterval(function() {
                barChart.data.datasets[0].label=$(  "#bin option:selected" ).text();  // เปลี่ยนชื่อถัง
                barChart.update();         
                db.collection("Data_Garbage")
                    .where("GarbageType", "==", "plastic")
                      .where("BinID","==",$( "#bin" )
                          .val()).where("Date","==",$('#Date')
                              .val()).onSnapshot(function(querySnapshot) {
                                querySnapshot.forEach(function(doc){
                                    var time =doc.data().Time;
                                    var date =doc.data().Date;
                                    var d = new Date(date+':'+time);
                                    var strD = (d.getHours()).toString();

                                    var t = parseInt(strD);
                                if(Boolean(t >= 8 &&t <= 11)){  //    ช่วงเวลาเช้า
                                    sum1+=1;
                                    

                                }else if(Boolean(t >= 12 &&t <= 17)){ //    ช่วงเวลาบ่าย
                                    sum2+=1;
                                    
                                
                                }else if(Boolean(t >= 18 &&t <= 23)){ //    ช่วงเวลาเย็น
                                    sum3+=1;
                                   
                                }
                                });
                                
            });
                db.collection("Data_Garbage")
                    .where("GarbageType", "==", "glass")
                      .where("BinID","==",$( "#bin" )
                          .val()).where("Date","==",$('#Date')
                              .val()).onSnapshot(function(querySnapshot) {
                                querySnapshot.forEach(function(doc){
                                    var time =doc.data().Time;
                                    var date =doc.data().Date;
                                    var d = new Date(date+':'+time);
                                    var strD = (d.getHours()).toString();

                                    var t = parseInt(strD);
                                if(Boolean(t >= 8 &&t <= 11)){ //    ช่วงเวลาเช้า
                                    sum1+=1;
                                    

                                }else if(Boolean(t >= 12 &&t <= 17)){ //    ช่วงเวลาบ่าย
                                    sum2+=1;
                                   
                                
                                }else if(Boolean(t >= 18 &&t <= 23)){ //ช่วงเวลาเย็น
                                    sum3+=1;
                                    
                                }
                                });
                                
            });
                db.collection("Data_Garbage")
                    .where("GarbageType", "==", "metal")
                      .where("BinID","==",$( "#bin" )
                          .val()).where("Date","==",$('#Date')
                              .val()).onSnapshot(function(querySnapshot) {
                                querySnapshot.forEach(function(doc){
                                    var time =doc.data().Time;
                                    var date =doc.data().Date;
                                    var d = new Date(date+':'+time);
                                    var strD = (d.getHours()).toString();

                                    var t = parseInt(strD);
                                if(Boolean(t >= 8 &&t <= 11)){  //    ช่วงเวลาเช้า
                                    sum1+=1;
                                  

                                }else if(Boolean(t >= 12 &&t <= 17)){ //    ช่วงเวลาบ่าย
                                    sum2+=1;
                                 
                                
                                }else if(Boolean(t >= 18 &&t <= 23)){ //ช่วงเวลาเย้น
                                    sum3+=1;
                                  
                                }
                                });
                               
            });
                average1 = (sum1/(sum1+sum2+sum3))*100
                average2 = (sum2/(sum1+sum2+sum3))*100
                average3 = (sum3/(sum1+sum2+sum3))*100
                barChart.data.datasets[0].data[0]=average1.toFixed(2);
                sum1=0;
                average1 = 0;
                barChart.data.datasets[0].data[1]=average2.toFixed(2);
                sum2=0;
                average2 = 0;
                barChart.data.datasets[0].data[2]=average3.toFixed(2);
                sum3=0;
                average3 = 0;
                barChart.update();
              
        },1000);


    });
</script>

@endsection