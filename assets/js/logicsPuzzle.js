// Начальная растановка
var board = Chessboard('board', 'start')
$(window).resize(board.resize)
// Количество решеных задач подряд
var countSolvedPuzzle = 0


countDoc = document.getElementById('countPuzzleStreek')
warning = document.getElementById('warning')
ratingPuzzle = document.getElementById('rating')

//----------------------------------

// -------------------------------------------------------------

// Функция которая запускает игру
// 
function newPosition() {
    $.ajax({
        /* Куда отправить запрос */
        url: 'http://project/ajax/getPosition.php',        
        /* Метод запроса (post или get) */ 
        method: 'POST',          
        data: {'func': 'getPositionFromDb'},
        /* функция которая будет выполнена после успешного запроса.  */
        success: function restart(result){   
        // Получаем позицию 
        const puzzleInfo = JSON.parse(result);
        let fenPuzzle = puzzleInfo["FEN"]
        let answerPuzzle = puzzleInfo["Moves"]
        let arrAnswer = answerPuzzle.split(' ');

        console.log(puzzleInfo)

        ratingPuzzle.innerHTML = `${puzzleInfo["Rating"]}`
        

        // ----------------------------------------------------------------------------------------------
        // NOTE: this example uses the chess.js library:
        // https://github.com/jhlywa/chess.js

        // var board = null
        var game = new Chess(fenPuzzle)
        // var $status = $('#status')
        // var $fen = $('#fen')
        // var $pgn = $('#pgn')
        // let movesPuzzle = []


        function onDragStart (source, piece, position, orientation) {
            // do not pick up pieces if the game is over
            if (game.game_over()) return false

            // only pick up pieces for the side to move
            if ((game.turn() === 'w' && piece.search(/^b/) !== -1) ||
                (game.turn() === 'b' && piece.search(/^w/) !== -1)) {
                return false
            }
        }

        function onDrop (source, target) {
            // see if the move is legal
            var move = game.move({
                from: source,
                to: target,
                promotion: 'q' // NOTE: always promote to a queen for example simplicity
            })

            // illegal move
            if (move === null) return 'snapback'


        }

        // update the board position after the piece snap
        // for castling, en passant, pawn promotion
        function onSnapEnd () {
            board.position(game.fen())
            window.setTimeout(updateStatus(), 0)

        }

        function updateStatus () 
        {
            // Определяем кто первый делает ход
            const turn = game.turn();
            // Если первым ходят белые
            // То мы отображаем доску со стороны ченых
            // Если первым ходят черные
            // То мы отображаем доску со стороны белых
            if(turn == 'w')
            {
                // Мы играем за черных
                board.orientation('black')
            }else
            {   
                // Мы играем за белых
                board.orientation('white')
            }
            

            // --------------------------
            // ДЛЯ МНОГОХОДОВОК 
            // console.log(arrAnswer)
            var history = game.history({ verbose: true });
            let start = arrAnswer[0]
            st = start.substring(0, start.length - 2);
            end = start.slice(-2);
            // console.log(`st->${st} end->${end}`)
            board.move(`${st}-${end}`)
            game.move({from:`${st}`, to:`${end}`})
            
            
            

            // ЕСЛИ ДЛИНА МАССИВА ОТВЕТОВ = ДЛИНЕ МАССИВА ХОДОВ
            if(history.length == arrAnswer.length)
            {
                // -------------
                countSolvedPuzzle++
                // countDoc.innerHTML = `Задач решено: ${countSolvedPuzzle}`
                countDoc.innerHTML = `${countSolvedPuzzle}`
                console.log(`Задач решено: ${countSolvedPuzzle}`)
                newPosition()
            }

            // ЕСЛИ ДЛИНА БЕЗ ОСТАТКА ДЕЛИТСЯ НА 2 ТО ХОД КОМПЬЮТЕРА
            if(history.length % 2 == 0)
            {
                // 
                var fromToHistory = history.map(function(move) {
                    return move.from + '-' + move.to;
                });
                
                // console.log(game.history())
                fromToHistory = fromToHistory[history.length-1].replace('-', '')
                console.log(arrAnswer)
                console.log(`fromToHistory ${fromToHistory}`)
                console.log(`arrAnswer[history.length-1] ${arrAnswer[history.length-1]}`)
                if(fromToHistory == arrAnswer[history.length-1])
                {
                    start = arrAnswer[history.length]
                    warning.innerHTML = `---`
                    st = start.substring(0, start.length - 2);
                    end = start.slice(-2);
                    console.log(`end->` + end)
                    console.log(`st->${st} end->${end}`)
                    board.move(st+`-`+end)
                    game.move({from:`${st}`, to:`${end}`}) 
                    // 
                    
                    // 
                }else{
                    let last_level_id =  puzzleInfo["PuzzleId"]
                    // Посылаем запрос на установление рекорда
                        $.ajax({
                            type: 'POST',
                            url: 'http://project/ajax/getRecordPuzzle.php',
                            data: {'data': countSolvedPuzzle,
                                   'data1': last_level_id},
                        })
                    
                    // --------------------------
                    countSolvedPuzzle = 0
                    countDoc.innerHTML = `${countSolvedPuzzle}`
                    warning.innerHTML = `Вы ошиблись! Попробуйте еще раз!`
                    restart(result)
                }
            }

        }
        
        

            var config = 
            {
                moveSpeed: 'slow',
                
                snapbackSpeed: 100,
                snapSpeed: 0,
                draggable: true,
                position: fenPuzzle,
                onDragStart: onDragStart,
                onSnapEnd: onSnapEnd,
                onDrop: onDrop
            }
            // updateStatus()
            board = Chessboard('board', config)
            updateStatus()

        }

    });
}

newPosition()