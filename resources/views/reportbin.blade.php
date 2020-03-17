@extends('layout.main2')
@section('title','รายงาน')
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
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.2/dist/FileSaver.min.js"></script>
<div class="container" id="div-box">
  <div class="container">
    <h2>ดาวน์โหลดรายงานข้อมูลจากถังขยะ</h2>
    <br>
    <div class="block-div">
            <div class="col-12 row" style="margin:10px 0px 10px 0px">
                    <div class="col-2">
                    <label>ชนิดรายงาน</label>
                    </div>
                    <div class="col-1">
                        <label>:</label>
                    </div>
                    <div class="col-9">
                        <select name="typebin" class="form-control radius20" id="typebin">
                            <!-- <option value="" disabled selected hidden>เลือกรายงาน</option> -->
                        </select>  
                    </div>    
                </div>    
            </div>       
            <div class="block-div">
                <div class="col-12 row" style="margin:10px 0px 10px 0px">
                    <div class="col-2">
                    <label>ถัง</label>
                    </div>
                    <div class="col-1">
                        <label>:</label>
                    </div>
                    <div class="col-9">
                        <select name="bin" class="form-control radius20" id="bin">
                            <!-- <option value="" disabled selected hidden>เลือกรายงาน</option> -->
                        </select>  
                    </div>    
                </div>    
            </div>  
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" onclick="select(1)" href="#home">แบบรายวัน</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" onclick="select(2)" href="#menu1">แบบรายเดือน</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" onclick="select(3)" href="#menu2">แบบรายปี</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="home" class="container tab-pane active"><br>
        <h3>ดาวน์โหลดรายงานแบบรายวัน </h3>
     
            <div class="block-div">
                <div class="col-12 row" style="margin:10px 0px 10px 0px">
                    <div class="col-2">
                    <label>วัน/เดือน/ปี</label>
                    </div>
                    <div class="col-1">
                        <label>:</label>
                    </div>
                    <div class="col-9">
                        <input class="form-control radius20" id="dday" type="date" name="bday-month" value="03">
                    </div>    
                </div>    
            </div>       
        <button type="button" onclick="download_csv1() "class="btn btn-outline-warning btn-block radius20">ดาวน์โหลด</button>
        </div>

        <div id="menu1" class="container tab-pane fade"><br>
        <h3>ดาวน์โหลดรายงานแบบรายเดือน</h3>
        <br>
        <div class="block-div">
                <div class="col-12 row" style="margin:10px 0px 10px 0px">
                <div class="form-inline">
                    <label for="email" class="mr-sm-2">เดือน:</label>
                    <input class="form-control radius20" id="b-month" type="month" name="b-month" value="2020-03">
                </div>  
                </div>    
            </div>       
         <br>
            <button type="button" onclick="download_csv2()" class="btn btn-outline-warning btn-block radius20">ดาวน์โหลด</button>
        </div>

        <div id="menu2" class="container tab-pane fade"><br>
        <h3>ดาวน์โหลดรายงานแบบรายปี</h3>
        <div class="block-div">
                <div class="col-12 row" style="margin:10px 0px 10px 0px">
                    <div class="col-2">
                    <label>ปี</label>
                    </div>
                    <div class="col-1">
                        <label>:</label>
                    </div>
                    <div class="col-9">
                    <input class="form-control radius20" id="yyyy" type="number" name="bday-month" value="2020" max="4">
                    </div>    
                </div>    
            </div>       
        <button type="button" onclick="download_csv3() " class="btn btn-outline-warning btn-block radius20">ดาวน์โหลด</button>
        </div>
    </div>
    </div>
</div>
<!-- <button >Download CSV</button>  -->
<!-- //// -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-firestore.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>

        //  $( "#yyyy" ).datepicker({dateFormat: 'yyyy'});
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
          //  <!-- <option value="" disabled selected hidden>เลือกรายงาน</option> -->
            $('#bin').append('<option  value ="' + doc.id + '">' +'ถังขยะที่ '+doc.data().Bin_number+' '+doc.data().Building_Number + '</option>');
        });
    });
    //   console.log($(  "#bin option:selected" ).val());
        
var array = ["ข้อมูลขยะรีไซเคิล", "ข้อมูลขยะตามช่วงเวลา"];

array.forEach(element => {

    // console.log(element);
    $('#typebin').append('<option id ="' + element + '">' + element + '</option>');
});


var listDate=[];

var Select_type = 1 
function select(val){
    Select_type = val
    console.log(val)
}
function download_csv1() {
                //  console.log()
                   if ($('#typebin').val()=='ข้อมูลขยะรีไซเคิล'){
                    metal = 0 ;
                    general = 0 ;
                    glass = 0 ;
                    plastic = 0 ;
                    var name_bin=""
                    db.collection("Data_Garbage").where("BinID","==",$( "#bin" ).val()).onSnapshot(function(querySnapshot) {
                        querySnapshot.forEach(function(doc){
                            date = doc.data().Date;
                            date2 = $("#dday").val();
                            var pos = date.search( date2 );
                            if ( pos != -1 ) {
                 
                                if (doc.data().GarbageType == 'metal'){
                                    metal++;
                                }else if (doc.data().GarbageType == 'general'){
                                    general++;
                                }else if (doc.data().GarbageType == 'glass'){
                                    glass++;
                                }else if (doc.data().GarbageType == 'plastic'){
                                    plastic++;
                                }
                            }
                        });
                            per_metal = ((metal/(metal+general+glass+plastic))*100).toFixed(2)
                            per_glass= ((glass/(metal+general+glass+plastic))*100).toFixed(2)
                            per_plastic = ((plastic/(metal+general+glass+plastic))*100).toFixed(2)
                            per_general = ((general/(metal+general+glass+plastic))*100).toFixed(2)

                            A = (100-per_general).toFixed(2)
                            B = per_general


                        var data = [ 
                                    ['metal', String(metal),String(per_metal)+'%'],
                                    ['glass', String(glass),String(per_glass)+'%'],
                                    ['plastic', String(plastic),String(per_plastic)+'%'],
                                    ['general', String(general),String(per_general)+'%'],
                                    [],
                                    ['Comparison information between recyclable and non-recyclable waste'],
                                    ['recyclable',[],A+'%'],
                                    ['non-recyclable',[],B+'%'],
                                    ];
                        var csv = 'day ('+$('#dday').val()+')\nBin '+$('#bin').val()+'\nGarbage type,amount, percent (%)\n';
                        data.forEach(function(row) {
                                csv += row.join(',');
                                csv += "\n";
                        });            
                            console.log(csv);
                            var hiddenElement = document.createElement('a');
                            hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                            hiddenElement.target = '_blank';
                            hiddenElement.download = 'data_Periodic-waste-data_day.csv';
                            hiddenElement.click();
                       
                    });
                   }
                   else if($('#typebin').val()=='ข้อมูลขยะตามช่วงเวลา'){
                    // metal = 0 ;
                    // general = 0 ;
                    // glass = 0 ;
                    // plastic = 0 ;

                    var sum1 =0;
                    var sum2 =0;
                    var sum3 =0;
            
                    var name_bin=""
                    db.collection("Data_Garbage").where("BinID","==",$( "#bin" ).val()).onSnapshot(function(querySnapshot) {
                        querySnapshot.forEach(function(doc){
                            date = doc.data().Date;
                            date2 = $("#dday").val();
                            var pos = date.search( date2 );
                            if ( pos != -1 ) {
                 
                                if (doc.data().GarbageType == 'general'){
                                    
                                }else{
                                    var time =doc.data().Time;
                                    var date =doc.data().Date;
                                    var d = new Date(date+':'+time);
                                    var strD = (d.getHours()).toString();

                                    var t = parseInt(strD);
                                    if(Boolean(t >= 8 &&t <= 11)){  //    ช่วงเวลาเช้า
                                        sum1+=1;
                                        // console.log('sum3 '+su1);
                                        // console.log('t = '+t);

                                    }else if(Boolean(t >= 12 &&t <= 17)){ //    ช่วงเวลาบ่าย
                                        sum2+=1;
                                        // console.log('sum3 '+sum2);
                                        // console.log('t = '+t);
                                    
                                    }else if(Boolean(t >= 18 &&t <= 23)){ //    ช่วงเวลาเย้น
                                        sum3+=1;
                                        // console.log('sum3 '+sum3);
                                        // console.log('t = '+t);
                                    }
                                }
                   
                            }
                                // });

                    });
                    average1 =((sum1/(sum1+sum2+sum3))*100).toFixed(2)
                    average2 = ((sum2/(sum1+sum2+sum3))*100).toFixed(2)
                    average3 = ((sum3/(sum1+sum2+sum3))*100).toFixed(2)
                        var data = [ 
                                    ['(08:00-11:59)', String(average1)],
                                    ['(12:00-17:59)', String(average2)],
                                    ['(18:00-23:59)', String(average3)],
                                    ];
                        var csv = 'day ('+$('#dday').val()+')\nBin '+$('#bin').val()+'\nTime period, percent (%)\n';
                        data.forEach(function(row) {
                                csv += row.join(',');
                                csv += "\n";
                        });            
                            console.log(csv);
                            var hiddenElement = document.createElement('a');
                            hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                            hiddenElement.target = '_blank';
                            hiddenElement.download = 'data_recycling_day.csv';
                            hiddenElement.click();
                       
                    });

                   }

}    

function download_csv2() {
                //  console.log()
                   if ($('#typebin').val()=='ข้อมูลขยะรีไซเคิล'){
                    metal = 0 ;
                    general = 0 ;
                    glass = 0 ;
                    plastic = 0 ;
                    var name_bin=""
                    db.collection("Data_Garbage").where("BinID","==",$( "#bin" ).val()).onSnapshot(function(querySnapshot) {
                        querySnapshot.forEach(function(doc){
                            date = doc.data().Date;
                            date2 = $("#dday").val();
                            var pos = date.search( date2 );
                            if ( pos != -1 ) {
                 
                                if (doc.data().GarbageType == 'metal'){
                                    metal++;
                                }else if (doc.data().GarbageType == 'general'){
                                    general++;
                                }else if (doc.data().GarbageType == 'glass'){
                                    glass++;
                                }else if (doc.data().GarbageType == 'plastic'){
                                    plastic++;
                                }
                            }
                        });
                            per_metal = ((metal/(metal+general+glass+plastic))*100).toFixed(2)
                            per_glass= ((glass/(metal+general+glass+plastic))*100).toFixed(2)
                            per_plastic = ((plastic/(metal+general+glass+plastic))*100).toFixed(2)
                            per_general = ((general/(metal+general+glass+plastic))*100).toFixed(2)

                            A = (100-per_general).toFixed(2)
                            B = per_general


                        var data = [ 
                                    ['metal', String(metal),String(per_metal)+'%'],
                                    ['glass', String(glass),String(per_glass)+'%'],
                                    ['plastic', String(plastic),String(per_plastic)+'%'],
                                    ['general', String(general),String(per_general)+'%'],
                                    [],
                                    ['Comparison information between recyclable and non-recyclable waste'],
                                    ['recyclable',[],A+'%'],
                                    ['non-recyclable',[],B+'%'],
                                    ];
                                    var csv = 'month ('+$('#b-month').val()+')\nBin '+$('#bin').val()+'\nGarbage type,amount, percent (%)\n';
                        data.forEach(function(row) {
                                csv += row.join(',');
                                csv += "\n";
                        });            
                            console.log(csv);
                            var hiddenElement = document.createElement('a');
                            hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                            hiddenElement.target = '_blank';
                            hiddenElement.download = 'data_recycling_month.csv';
                            hiddenElement.click();
                       
                    });
                   }
                   else if($('#typebin').val()=='ข้อมูลขยะตามช่วงเวลา'){
                    // metal = 0 ;
                    // general = 0 ;
                    // glass = 0 ;
                    // plastic = 0 ;

                    var sum1 =0;
                    var sum2 =0;
                    var sum3 =0;
            
                    var name_bin=""
                    db.collection("Data_Garbage").where("BinID","==",$( "#bin" ).val()).onSnapshot(function(querySnapshot) {
                        querySnapshot.forEach(function(doc){
                            date = doc.data().Date;
                            date2 = $("#b-month").val();
                            var pos = date.search( date2 );
                            if ( pos != -1 ) {
                 
                                if (doc.data().GarbageType == 'general'){
                                    
                                }else{
                                    var time =doc.data().Time;
                                    var date =doc.data().Date;
                                    var d = new Date(date+':'+time);
                                    var strD = (d.getHours()).toString();

                                    var t = parseInt(strD);
                                    if(Boolean(t >= 8 &&t <= 11)){  //    ช่วงเวลาเช้า
                                        sum1+=1;
                                        // console.log('sum3 '+su1);
                                        // console.log('t = '+t);

                                    }else if(Boolean(t >= 12 &&t <= 17)){ //    ช่วงเวลาบ่าย
                                        sum2+=1;
                                        // console.log('sum3 '+sum2);
                                        // console.log('t = '+t);
                                    
                                    }else if(Boolean(t >= 18 &&t <= 23)){ //    ช่วงเวลาเย้น
                                        sum3+=1;
                                        // console.log('sum3 '+sum3);
                                        // console.log('t = '+t);
                                    }
                                }
                   
                            }
                                // });

                    });
                    average1 =((sum1/(sum1+sum2+sum3))*100).toFixed(2)
                    average2 = ((sum2/(sum1+sum2+sum3))*100).toFixed(2)
                    average3 = ((sum3/(sum1+sum2+sum3))*100).toFixed(2)
                        var data = [ 
                                    ['(08:00-11:59)', String(average1)],
                                    ['(12:00-17:59)', String(average2)],
                                    ['(18:00-23:59)', String(average3)],
                                    ];
                        var csv = 'month ('+$('#b-month').val()+')\nBin '+$('#bin').val()+'\nTime period, percent (%)\n';
                        data.forEach(function(row) {
                                csv += row.join(',');
                                csv += "\n";
                        });            
                            console.log(csv);
                            var hiddenElement = document.createElement('a');
                            hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                            hiddenElement.target = '_blank';
                            hiddenElement.download = 'data_recycling_day.csv';
                            hiddenElement.click();
                       
                    });

                   }

} 
function download_csv3() {
                //  console.log()
                   if ($('#typebin').val()=='ข้อมูลขยะรีไซเคิล'){
                    metal = 0 ;
                    general = 0 ;
                    glass = 0 ;
                    plastic = 0 ;
                    var name_bin=""
                    db.collection("Data_Garbage").where("BinID","==",$( "#bin" ).val()).onSnapshot(function(querySnapshot) {
                        querySnapshot.forEach(function(doc){
                            date = doc.data().Date;
                            date2 = $("#dday").val();
                            var pos = date.search( date2 );
                            if ( pos != -1 ) {
                 
                                if (doc.data().GarbageType == 'metal'){
                                    metal++;
                                }else if (doc.data().GarbageType == 'general'){
                                    general++;
                                }else if (doc.data().GarbageType == 'glass'){
                                    glass++;
                                }else if (doc.data().GarbageType == 'plastic'){
                                    plastic++;
                                }
                            }
                        });
                            per_metal = ((metal/(metal+general+glass+plastic))*100).toFixed(2)
                            per_glass= ((glass/(metal+general+glass+plastic))*100).toFixed(2)
                            per_plastic = ((plastic/(metal+general+glass+plastic))*100).toFixed(2)
                            per_general = ((general/(metal+general+glass+plastic))*100).toFixed(2)

                            A = (100-per_general).toFixed(2)
                            B = per_general


                        var data = [ 
                                    ['metal', String(metal),String(per_metal)+'%'],
                                    ['glass', String(glass),String(per_glass)+'%'],
                                    ['plastic', String(plastic),String(per_plastic)+'%'],
                                    ['general', String(general),String(per_general)+'%'],
                                    [],
                                    ['Comparison information between recyclable and non-recyclable waste'],
                                    ['recyclable',[],A+'%'],
                                    ['non-recyclable',[],B+'%'],
                                    ];
                                    var csv = 'years ('+$('#yyyy').val()+')\nBin '+$('#bin').val()+'\nGarbage type,amount, percent (%)\n';
                        data.forEach(function(row) {
                                csv += row.join(',');
                                csv += "\n";
                        });             
                        console.log(csv);
                        var hiddenElement = document.createElement('a');
                        hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                        hiddenElement.target = '_blank';
                        hiddenElement.download = 'data_recycling_month.csv';
                        hiddenElement.click();
                        });
                   }
                   else if($('#typebin').val()=='ข้อมูลขยะตามช่วงเวลา'){
                    // metal = 0 ;
                    // general = 0 ;
                    // glass = 0 ;
                    // plastic = 0 ;

                    var sum1 =0;
                    var sum2 =0;
                    var sum3 =0;
            
                    var name_bin=""
                    db.collection("Data_Garbage").where("BinID","==",$( "#bin" ).val()).onSnapshot(function(querySnapshot) {
                        querySnapshot.forEach(function(doc){
                            date = doc.data().Date;
                            date2 = $("#yyyy").val();
                            var pos = date.search( date2 );
                            if ( pos != -1 ) {
                 
                                if (doc.data().GarbageType == 'general'){
                                    
                                }else{
                                    var time =doc.data().Time;
                                    var date =doc.data().Date;
                                    var d = new Date(date+':'+time);
                                    var strD = (d.getHours()).toString();

                                    var t = parseInt(strD);
                                    if(Boolean(t >= 8 &&t <= 11)){  //    ช่วงเวลาเช้า
                                        sum1+=1;
                                        // console.log('sum3 '+su1);
                                        // console.log('t = '+t);

                                    }else if(Boolean(t >= 12 &&t <= 17)){ //    ช่วงเวลาบ่าย
                                        sum2+=1;
                                        // console.log('sum3 '+sum2);
                                        // console.log('t = '+t);
                                    
                                    }else if(Boolean(t >= 18 &&t <= 23)){ //    ช่วงเวลาเย้น
                                        sum3+=1;
                                        // console.log('sum3 '+sum3);
                                        // console.log('t = '+t);
                                    }
                                }
                   
                            }
                                // });

                    });
                    average1 =((sum1/(sum1+sum2+sum3))*100).toFixed(2)
                    average2 = ((sum2/(sum1+sum2+sum3))*100).toFixed(2)
                    average3 = ((sum3/(sum1+sum2+sum3))*100).toFixed(2)
                        var data = [ 
                                    ['(08:00-11:59)', String(average1)],
                                    ['(12:00-17:59)', String(average2)],
                                    ['(18:00-23:59)', String(average3)],
                                    ];
                        var csv = 'year ('+$('#yyyy').val()+')\nBin '+$('#bin').val()+'\nTime period, percent (%)\n';
                        data.forEach(function(row) {
                                csv += row.join(',');
                                csv += "\n";
                        });            
                            console.log(csv);
                            var hiddenElement = document.createElement('a');
                            hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                            hiddenElement.target = '_blank';
                            hiddenElement.download = 'data_recycling_years.csv';
                            hiddenElement.click();
                       
                    });

                   }

} 

</script>
<script>

 
 
</script>
@endsection