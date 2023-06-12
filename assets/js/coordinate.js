var board;
const alph = 'Nabcdefgh';

let count = 0;
let lastResult;
const btn = document.querySelector('.btn');
const coord = document.querySelector('.coord');
let counter = document.querySelector('.count');

btn.addEventListener('click', function() {
    btn.style.display = 'none';
    startTimer();
    document.getElementById("count").innerHTML = count;

    //
    coord.style.display= 'block';
    counter.style.display='block';
    //

    clickOnDesc();
});

board = document.createElement('div');
board.className='board';
document.querySelector('.desc').append(board);
for (let i = 8; i > 0; i--) {
    for (let j = 1; j < 9; j++) {
        const square=document.createElement('div');
        square.classList.add('_'+alph.charAt(j),'_'+i);
        if((i+j)%2==1)
        {
            square.classList.add('white');
        }else
        {
            square.classList.add('black');
        }
        if (square.classList[0] == '_a')
        {
            let index=document.createElement('div');
            index.className = 'Vindex';
            index.textContent=i;
            square.append(index);
        }
        if(square.classList[1]=='_1')
        {
            let index = document.createElement('div');
            index.className="Hindex";
            index.textContent=alph.charAt(j);
            square.append(index);
        }
        square.classList.add('square');
        // 
        const letter = alph[j];
        const number = i;
        square.dataset.coordinate = `${letter}${number}`;
        // 
        board.append(square);
        //console.log(square);
    }
}

window.addEventListener('resize', resizer)
resizer();

function resizer()
{
    // resize доски
    let bsize = 0.8*(Math.min(window.innerWidth, window.innerHeight));
    board.style.width=bsize+'px';
    board.style.height=bsize+'px';
    // resize разметки
    let fsize = 0.04*bsize;
    let v = document.querySelectorAll('Vindex');
    let h = document.querySelectorAll('Hindex');
    v.forEach(element=>{
        element.style.fontSize = fsize+'px';
    });

    
    h.forEach(element=>{
        element.style.fontSize = fsize+'px';
    });
}


// генератор координат
function generateRandomChessCoordinate() {
    const letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
    const randomLetter = letters[Math.floor(Math.random() * letters.length)];
    const randomNumber = Math.floor(Math.random() * 8) + 1;
    return randomLetter + randomNumber;
  }
  
function clickOnDesc()
{
    let res = document.getElementById("result").innerHTML = generateRandomChessCoordinate();

    // получаем клик по клетке
    const squares = document.querySelectorAll('.square');
    squares.forEach(square => {
    square.addEventListener('click', () => {
        let coordinate = square.dataset.coordinate;
        console.log(`${coordinate}`);
        if(coordinate === res){
            count++;
            lastResult = count;
            document.getElementById("count").innerHTML = count;
            res = document.getElementById("result").innerHTML = generateRandomChessCoordinate();
        }    
    });
    });
}


function startTimer()
{
  let timeInSeconds = 30;
  // Получаем элемент таймера
  const timerElement = document.getElementById("timer");

  // Обновляем таймер каждую секунду
  const timerInterval = setInterval(() => {
    // Вычисляем минуты и секунды
    const minutes = Math.floor(timeInSeconds / 60);
    const seconds = timeInSeconds % 60;

    // Форматируем время
    const formattedTime = `${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;

    // Обновляем элемент таймера
    timerElement.innerText = formattedTime;

    // Уменьшаем время на одну секунду
    timeInSeconds--;

    // Если время вышло, останавливаем таймер
    if (timeInSeconds < 0) {
      clearInterval(timerInterval);
      timerElement.innerText = "Time's up!";
      //   location.reload();
      btn.style.display = 'block';
    //   Посылаем запрос на установление рекорда
        $.ajax({
            type: 'POST',
            url: 'http://project/ajax/getRecordCoordinate.php',
            data: {'data': count},
        })
      console.log(count)
      //----------   
      count = 0;
      coord.style.display= 'none';
      counter.style.display='none';
    }
  }, 1000);

    // Заносим результат
    let resP = document.querySelector('.resP');
    
    resP.textContent = `Предыдущий результат: ${lastResult}`;   
}
  
