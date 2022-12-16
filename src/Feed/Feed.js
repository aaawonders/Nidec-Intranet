
var Feed = document.getElementById('Feed');
var SFeed = document.getElementsByClassName("SemFeed")[0];



var feedUn = document.getElementsByClassName('feed');
var feedBlock = document.getElementsByClassName('info');



for (let i = 0; i < News.length; i++){
    var feedList = document.createElement('div');
    var feedH1 = document.createElement('h1');
    var feedSpan = document.createElement('span');
    var feedInfo = document.createElement('div');
    var feedP = document.createElement('p');
    var feedImg = document.createElement('img');


    Feed.appendChild(feedList);
    feedList.className = "feed f"+i;


    feedUn[i].appendChild(feedInfo);
    feedInfo.className = "info";


    feedBlock[i].appendChild(feedH1);
    feedH1.innerHTML = News[i].Title;


    feedBlock[i].appendChild(feedSpan);
    feedSpan.id = "line";

    feedBlock[i].appendChild(feedP);
    feedP.innerHTML = News[i].Assunto.substring(0, 180) + ' ...';

    feedUn[i].appendChild(feedImg);
    feedImg.src = News[i].Imagem;
}

var Page = document.getElementsByClassName("page")[0];



if (Feed.childNodes.length > 3) {
    SFeed.style.display = "none";
} else {
    SFeed.style.display = "flex";
}


function TempoReal(){
    let ActualTime = new Date();

    let hora = ActualTime.getHours() + ':' + ActualTime.getMinutes() + ':' + ActualTime.getSeconds();

    document.getElementById('hora').innerHTML = hora;
}

setInterval(function() {TempoReal()}, 100);

var popUp = document.getElementsByClassName('PopUp')[0];


Feed.addEventListener('click', function(e) {
    if (e.path[2].classList[0] == 'feed') {
        let feedClass = e.path[2].classList[1];
            feedClass = feedClass.replace('f','');
            feedClass = Number(feedClass);

        var feedFull = document.getElementsByClassName('OpenNews')[0];
        feedFull.classList.add('active');
        popUp.classList.add('active');

        NewsBuild();

        function NewsBuild(){
            for (let i = 0; i < News.length; i++){
                if (i == feedClass) {
                    var hTitle = document.createElement('h1');
                    var pDate = document.createElement('p');
                    var spanLine = document.createElement('span');
                    var divImg = document.createElement('div');
                    var NewsImg = document.createElement('img');
                    var pAssunto = document.createElement('p');
    
                    feedFull.appendChild(hTitle);
                    hTitle.className = 'NewsTitle';
                    hTitle.innerHTML = News[i].Title;
    
                    feedFull.appendChild(pDate);
                    pDate.className = 'NewsData';
                    pDate.innerHTML = News[i].Data;
    
                    feedFull.appendChild(spanLine);
                    spanLine.className = 'line';
    
                    feedFull.appendChild(divImg);
                    divImg.className = 'NewsImg';
    
                    divImg.appendChild(NewsImg);
                    NewsImg.src = News[i].Imagem;
    
    
                    feedFull.appendChild(pAssunto);
                    pAssunto.className = 'NewsBody';
                    pAssunto.innerHTML = News[i].Assunto;
    
                }
            }
        }


        // <p class="NewsClose">X</p>
        // <h1 class="NewsTitle">Titulo</h1>
        // <p class="NewsData">13/09/2022</p>
        // <span class="line"></span>
        // <div class="NewsImg">
        //     <img src="https://images.unsplash.com/photo-1565347878134-064b9185ced8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
        // </div>
        // <br>
        // <br>
        // <p class="NewsBody">body</p>
    }
})

var closeFeed = document.getElementsByClassName('NewsClose')[0];

closeFeed.addEventListener('click', () => {
    var feedFull = document.getElementsByClassName('OpenNews')[0];

    feedFull.classList.remove('active');
    popUp.classList.remove('active');

    while (feedFull.childNodes.length > 2) {
        feedFull.removeChild(feedFull.lastChild);
    }
});



// Pagination
var page = document.querySelectorAll('.pagination')[0];


var pageLink = document.getElementsByClassName('page-link');

pageLink[1].classList.add('active');


page.addEventListener('click', function(e) {
    
    var pageItem = document.getElementsByClassName('page-item');

    if (e.target.className == 'page-link'){
    for (var i = 0; i < pageLink.length; i++){
        if (pageLink[i].classList.contains('active')) {
            pageLink[i].classList.remove('active');
        }
    }

        e.target.className += ' active';

        if (e.target.innerHTML > 1) {
            pageItem[0].classList.remove('disabled');
        } else {
            pageItem[0].classList.add('disabled');
        }

    }
});

var AddNews = document.getElementsByClassName('btAddNews')[0];
var closeFeed = document.getElementsByClassName('addNewsClose')[0];

AddNews.addEventListener('click', () => {
    var OpenAdd = document.getElementsByClassName('AddNews')[0];
    alert('teste');
    OpenAdd.classList.add('active');
    popUp.classList.add('active');
});



closeFeed.addEventListener('click', () => {
    var OpenAdd = document.getElementsByClassName('AddNews')[0];

    OpenAdd.classList.remove('active');
    popUp.classList.remove('active');
});
