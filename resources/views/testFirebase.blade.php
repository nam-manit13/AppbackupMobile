<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     
    
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-firestore.js"></script>
     
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
        </script>
</head>
<body>
    <button id="add-bin" onclick="addStaff()">เพิ่มถังขยะ</button>
    
    <script> //เพิ่มข้อมูลแม่บ้าน

db.collection("Bin")
    .onSnapshot(function(querySnapshot) {
       querySnapshot.forEach(function(doc) {
        console.log(doc.id);
        });
    });
   

/////////////////////////**********************************
        function addStaff(){
            db.collection("Staff").add({
            Username: 'test',
            Password: "test",
            Full_name: "NameTest LastName",
            Building_Staff:1,
            Type_Notification:"7"
        })
        .then(function(docRef) {
            console.log("Document written with ID: ", docRef.id);
        })
        .catch(function(error) {
            console.error("Error adding document: ", error);
        });    
        }
        
        // function addBin(){
        //     var OFF = new Date();
        //     var On = new Date();
        //     console.log(On)
        //     db.collection("Bin").add({
        //     BinID: 'binID',
        //     Location: "test",
        //     Building_Number: "NameTest LastName",
        //     Type_Notification:"7",
        //     Time_off:OFF,
        //     Time_on:On,
        //     Staff:"miZ3tF1QMagNRlf3hG0n"
        // })
        // .then(function(docRef) {
        //     console.log("Document written with ID: ", docRef.id);
        // })
        // .catch(function(error) {
        //     console.error("Error adding document: ", error);
        // });       
        // }


       // var docRef = db.collection("Data_Garbage");
//        db.collection("Data_Garbage").get().then(function(querySnapshot) {
//        // console.log(querySnapshot);
//             querySnapshot.forEach(function(doc) {
//             console.log(doc.data().GarbageType);
//             // if(doc.data().GarbageType == 'general'){
//             //     console.log('general',doc.data().GarbageType);
//             // }else{
//             //     console.log('general',doc.data().GarbageType);
//             // }
//      });
// });

// ///
// querySnapshot.forEach(function(doc) {
//             console.log('data',doc.size);
//         });

// db.collection("Data_Garbage").where("GarbageType", "==", "glass")
//     .onSnapshot(function(querySnapshot) {
//        console.log(querySnapshot.size);
//     });
        


//     firebase.database().ref('/Oslo/temperature').once('value').then(function(snapshot) {
//         temps = snapshot.val();
//         console.log(temps);

//         google.charts.load('current', {
//             'packages': ['corechart', 'line']
//         });
//         google.charts.setOnLoadCallback(drawChart(temps));
//     });

//     function parse(temp) {
//         return (new Date(temp.replace(/-/g, '/'))).getTime()
//     }



//     function drawChart(temps) {
//         var array = $.map(temps, function(value, index) {
//             return [value];
//         });

//         var data = new google.visualization.DataTable();
//         data.addColumn('number', 'date');
//         data.addColumn('number', 'time');
//         data.addColumn('number', 'value');

//         var sort = function(a, b) {
//             return parse(a.time) - parse(b.time)
//         };
//         var tempData = array.sort(sort);
//         var output = [];

//         for (var i = 0; i < tempData.length; i++) {
//             var item = tempData[i];
//             output.push([
//                 //  parseFloat(parse(item.time)),
//                 parseFloat(item.time),
//                 parseFloat(item.date),
//                 parseFloat(item.value)
//             ]);
//         }
//         console.log(output);
//         data.addRows(output);


//         var options = {
//             chart: {
//                 title: 'title',
//                 subtitle: 'subtitle'
//             },
//             width: 900,
//             height: 500
//         };

//         var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
//         console.log("data + options: " + data, options)
//         chart.draw(data, options);
//     }



//     google.charts.load('current', {
//         'packages': ['corechart', 'line']
//     });
//     google.charts.setOnLoadCallback(drawChart);
</script>
</body>
</html>
{{-- 
<html>
  <head>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Memory', 80],
          ['CPU', 55],
          ['Network', 68]
        ]);

        var options = {
          width: 400, height: 120,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

        setInterval(function() {
          data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 13000);
        setInterval(function() {
          data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 5000);
        setInterval(function() {
          data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 26000);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 400px; height: 120px;"></div>
  </body>
</html> --}}