require('./bootstrap');


// let date = document.getElementById("date").value;
// let time = document.getElementById('time').value;
// let dateTime = document.getElementById('date_time');
// let postF = document.getElementById('post');
// postF.addEventListener('submit', () => {
//     dateTime.value = date + '-' + time;
// });

// let button = document.getElementById('button');
// let id = '{{ $chalet->id }}';
// button.addEventListener('click', () => {
//     let commentV = document.getElementById("myTextarea").value;
//     let ratedV = document.getElementsByName('rated');
//     for (var i = 0, length = ratedV.length; i < length; i++) {
//         if (ratedV[i].checked) {
//             ratedV = ratedV[i].value;
//             break;
//         }
//     }

//     axios.post('/cms/website/' + id + '/details', { comment: commentV, rated: ratedV })
//         .then(function(response) {
//             // handle success
//             console.log(response);
//             axios.get('/cms/website/' + id + '/details')
//                 .then(function(response) {
//                     // handle success
//                     console.log(response);
//                 })
//                 .catch(function(error) {
//                     // handle error
//                     console.log(error);
//                 })
//                 .then(function() {
//                     // always executed
//                 });
//         })
//         .catch(function(error) {
//             // handle error3s
//             console.log(error);
//         })
//         .then(function() {
//             // always executed
//         });
//     document.getElementById("myTextarea").value = "";
//     document.getElementsByName('rated').value = "";

// });
