$(document).ready( function() {
    // do stuff
    let dataCoordinate = []
    let dataPuzzleStreek = []
    $.ajax({
        url: "http://project/ajax/table2.php",
        method: 'POST',
        data: {'func': 'getTable'},
        success: function(result) {
            dataCoordinate = JSON.parse(result)
        }
    })

    $.ajax({
        url: "http://project/ajax/table.php",
        method: 'POST',
        data: {'func': 'getTable'},
        success: function(result) {
            // console.log(result)
            // console.log(JSON.parse(result));
            dataPuzzleStreek = JSON.parse(result)
            if(dataPuzzleStreek.length > dataCoordinate.length)
            {
                count = dataPuzzleStreek.length
            }else
            {
                count = dataCoordinate.length
            }
            // console.log(count)
            arr = new Array(count)
            // console.log(arr)
            for (let index = 0; index < arr.length; index++) {
                arr[index] = ' '
            }
            
            // ---------
            const ctx = document.getElementById('myChart');
            const mixedOptions = {};
            const mixedChart = new Chart(ctx, {
                data: {
                    datasets: [{
                        type: 'line',
                        label: 'Coordinate',
                        data: dataCoordinate
                    }, {
                        type: 'line',
                        label: 'PuzzleStreek',
                        data: dataPuzzleStreek,
                    }],
                    labels: arr
                },
                options: mixedOptions
            });
            // -------
        }
    
    })
})