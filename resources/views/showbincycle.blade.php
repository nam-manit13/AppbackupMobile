@extends('layout.main2')
@section('title','ข้อมูลขยะรีไซเคิล')
@section('headd')
<script>

</script>
@endsection
@section('content')


<style>
    #exampleFormControlSelect1 {
        border-radius: 20px;
    }
    
    #div-box {
        margin-top: 10%;
        margin-bottom: 10%;
        box-shadow: 5px 5px 5px 5px #ccc;
        padding: 3% 1% 10% 1%;
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
    <h3 class="text-center">ข้อมูลขยะรีไซเคิล</h3>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div id="donutchart" style="width: 100%; height: 500px;"></div>
            </div>
            <div class="col-sm-6">
                <div id="donutchart2" style="width: 100%; height: 100%;"></div>
            </div>
            <div class="col-sm-12">
                <div id="chart_div" style="width: 100%; height: 100%;"></div>
            </div>

            <div class="col-5 container">
                <br>
                <input id="Date" type="date" class="form-control radius20" />
            </div>
            <div class="col-5 container">
                <br>
                <select name="bin" class="form-control radius20" id="bin">
                </select>
            </div>
            <div class="col-11 container">
               <br>
                {{-- <button type="button" class="btn btn-outline-info btn-block radius20">ค้นหา</button> --}}
            </div>

        </div>
    </div>
</div>

<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-firestore.js"></script>
 
<script type="text/javascript">
$(document).ready(function(){
    // bar 
    var TypeSum =0;
    var TypeGeneral =0 ;



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
       querySnapshot.forEach(function(doc) {
        $('#bin').append('<option  value ="' + doc.id + '">' +'ถังขยะที่ '+ doc.data().Bin_number +' ' +doc.data().Building_Number + '</option>');
        });
    });
    var d = Date();
    db.collection("Data_Garbage").orderBy("Date", "desc").limit(1).onSnapshot(function(querySnapshot) {
               querySnapshot.forEach(function(doc) {
                  console.log(doc.data().Date);
                  document.getElementById("Date").value =doc.data().Date;
        });
        console.log('getDate',$('#Date').val());
            ///////////////
            // โดนัด 1     
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['bim', 'Per Day'],
        ['ขวดพลาสติก',    0],
        ['ขวดแก้ว',      0],
        ['กระป๋อง',  0],
        ['ขยะทั่วไป', 0]
      ]);

      var options = {
        title: 'แสดงข้อมูลขยะแต่ละชนิด (เปอร์เซ็นต์)',
        pieHole: 0.4,

      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
      chart.draw(data, options);
      var Plastic_bottle =0;    //ขวดพลาสติก
      var Glass_bottle   =0;    //ขวดแก้ว
      var metal         =0;     //กระป๋อง
      var General_waste  =0;    //ขยะทั่วไป
   
      setInterval(function() {
        db.collection("Data_Garbage").where("GarbageType", "==", "plastic").where("BinID","==",$( "#bin" ).val()).where("Date","==",$('#Date').val()).onSnapshot(function(querySnapshot) {
            Plastic_bottle=(querySnapshot.size);
        });
        db.collection("Data_Garbage").where("GarbageType", "==", "glass").where("BinID","==",$( "#bin" ).val()).where("Date","==",$('#Date').val()).onSnapshot(function(querySnapshot) {
            Glass_bottle=(querySnapshot.size);
        });
        db.collection("Data_Garbage").where("GarbageType", "==", "metal").where("BinID","==",$( "#bin" ).val()).where("Date","==",$('#Date').val()).onSnapshot(function(querySnapshot) {
            metal=(querySnapshot.size);
        });
        db.collection("Data_Garbage").where("GarbageType", "==", "general").where("BinID","==",$( "#bin" ).val()).where("Date","==",$('#Date').val()).onSnapshot(function(querySnapshot) {
            General_waste=(querySnapshot.size);
        });

         data.setValue(0, 1,Plastic_bottle );   //ขวดพลาสติก
         data.setValue(1, 1,Glass_bottle );     //ขวดแก้ว
         data.setValue(2, 1,metal );            //กระป๋อง
         data.setValue(3, 1,General_waste );    //ขยะทั่วไป
        chart.draw(data, options);
      },500);
    }
    // โดนัท 2
        google.charts.setOnLoadCallback(drawChart2);
    function drawChart2() {

      var data2 = google.visualization.arrayToDataTable([
        ['bim', 'Day'],
        ['ขวดพลาสติก',    0],
        ['ขวดแก้ว',      0],
        ['กระป๋อง', 0],
        ['ขยะทั่วไป', 0]
      ]);

      var options2 = {
          
        title: 'แสดงข้อมูลขยะแต่ละชนิด (ชิ้น)',
        pieHole: 0.4,
        pieSliceText:"value"
      };

      var chart2 = new google.visualization.PieChart(document.getElementById('donutchart2'));
      chart2.draw(data2, options2);
      var Plastic_bottle =0;    //ขวดพลาสติก
      var Glass_bottle   =0;    //ขวดแก้ว
      var metal         =0;     //กระป๋อง
      var General_waste  =0;    //ขยะทั่วไป
     
    
      setInterval(function() {
        db.collection("Data_Garbage").where("GarbageType", "==", "plastic").where("BinID","==",$( "#bin" ).val()).where("Date","==",$('#Date').val()).onSnapshot(function(querySnapshot) {
            Plastic_bottle=(querySnapshot.size);
        });
        db.collection("Data_Garbage").where("GarbageType", "==", "glass").where("BinID","==",$( "#bin" ).val()).where("Date","==",$('#Date').val()).onSnapshot(function(querySnapshot) {
            Glass_bottle=(querySnapshot.size);
        });
        db.collection("Data_Garbage").where("GarbageType", "==", "metal").where("BinID","==",$( "#bin" ).val()).where("Date","==",$('#Date').val()).onSnapshot(function(querySnapshot) {
            metal=(querySnapshot.size);
        });
        db.collection("Data_Garbage").where("GarbageType", "==", "general").where("BinID","==",$( "#bin" ).val()).where("Date","==",$('#Date').val()).onSnapshot(function(querySnapshot) {
            General_waste=(querySnapshot.size);
        });
         data2.setValue(0, 1,Plastic_bottle );  //ขวดพลาสติก
         data2.setValue(1, 1,Glass_bottle );    //ขวดแก้ว
         data2.setValue(2, 1,metal );           //กระป๋อง
         data2.setValue(3, 1,General_waste );   //ขยะทั่วไป

         TypeSum = Plastic_bottle + Glass_bottle + metal;
         TypeGeneral = General_waste;
        chart2.draw(data2, options2);
      },500);
   }
  /////////////////////////////
      
      // bar 
      var averageTypeSum = 0;
      var averageTypeGeneral = 0;
      setInterval(() => {
        google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawMultSeries);

    function drawMultSeries() {
        averageTypeSum = (TypeSum/(TypeSum+TypeGeneral))*100;
        averageTypeGeneral = (TypeGeneral/(TypeSum+TypeGeneral))*100;
        console.log(averageTypeSum.toFixed(2));
        console.log(averageTypeGeneral.toFixed(2));
        var data = google.visualization.arrayToDataTable([
        ['TypeBin', 'ขยะรีไซเคิลได้', 'ขยะรีไซเคิลไม่ได้'],
        ['ขยะรีไซเคิลได้', averageTypeSum, 0.00],
        ['ขยะรีไซเคิลไม่ได้', 0.00, averageTypeGeneral],
        ]);
        averageTypeSum=0;
        averageTypeGeneral=0;
        var options = {
        title: 'ข้อมูลเปรียบเทียบระหว่างขยะรีไซเคิลได้และรีไซเคิลไม่ได้',
        chartArea: {width: '50%'},
        hAxis: {
            // title: 'ณ วันที่ ',
            minValue: 100
        },
        scales: {
                    xAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                steps: 10,
                                stepValue: 5,
                                max: 100
                            }
                        }],
                    yAxes: [{
                            display: false,
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            }
                        }]
                    
                },
        // ticks: {
        //     max: 100,
        //     min: 0,
        //     stepSize: 10
        // }
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
      }, 500);




          
    });

});

  </script>

@endsection