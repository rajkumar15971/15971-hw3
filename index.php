<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
.holder #drag1, .holder #drag2{
    background-color:rgba(204, 204, 204, 0.7);
    transition:opacity 0.3s ease-in 0s;
}
.holder #drag2{
    opacity:0.0;
}
.holder{
    clear:both;
    padding:3em;
}
[id^="div"] {
    width: 80px;
    height: 80px;
    align:center;
    padding: 10px;
    border: 1px solid #aaaaaa;
    float:left;
    transition:background-color 0.3s linear 0s;
}
[id^="row"]{
    clear:both;
}
div{
	align:center;

}
</style>
<script type="text/javascript">

function allowDrop(ev) {
    ev.preventDefault();
}
function drag(ev) {
    ev.dataTransfer.setData("Text",ev.target.id);
}
function drop(ev) {
    var data=ev.dataTransfer.getData("Text");
    ev.target.appendChild(document.getElementById(data).cloneNode(true));
    if(document.getElementById(data).id == "drag1"){
        ev.target.style.backgroundColor="blue";
    }else{
        ev.target.style.backgroundColor="white";
    }
    ev.preventDefault();
    ev.target.removeAttribute("ondragover");
    document.getElementById(data).removeAttribute("ondragstart");
    document.getElementById(data).setAttribute("draggable","false");
    switchTurn();
    checkRows();
}
var turn = 1;
function switchTurn(){
    if(turn == 1){
        document.querySelector('.holder #drag1').style.opacity="0.0";
        document.querySelector('.holder #drag2').style.opacity="1.0";
        turn++;
    }else{
        document.querySelector('.holder #drag1').style.opacity="1.0";
        document.querySelector('.holder #drag2').style.opacity="0.0";
        turn--;
    }
}
    var array = [[], [], []];
    var rowNum = 0;
function checkRows(){
    var rows = ["row1", "row2", "row3"];
    var timesRan = 0;
    for(i=0;i < 3;i++){
        var img = document.getElementById(rows[rowNum]).getElementsByTagName('div')[i].getElementsByTagName('img')[0].src;

        array[rowNum].push(img);

        if(timesRan < 1){
            array[rowNum].shift();
            timesRan++;
        }
        console.log(array);             
    }
    rowNum++;
}
</script>
<title>Drag & Drop Tic-Tac-Toe</title>
</head>
<body>
    <h1><pre>                    <i> <b> Drag the <img id="drag1" src="https://raw.githubusercontent.com/christkv/tic-tac-toe/master/public/img/cross.png" width="25" height="25"/>and <img id="drag2" src="https://raw.githubusercontent.com/christkv/tic-tac-toe/master/public/img/circle.png" width="25" height="25" /> into the board:          </b></pre></h1>
    <div id="row1">
    <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    </div>
    <div id="row2">
    <div id="div4" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div id="div5" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div id="div6" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    </div>
    <div id="row3">
    <div id="div7" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div id="div8" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div id="div9" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    </div>
    <div class="holder">
    <img id="drag1" src="https://raw.githubusercontent.com/christkv/tic-tac-toe/master/public/img/cross.png" draggable="true" 
        ondragstart="drag(event)" width="75" height="75" />
    <img id="drag2" src="https://raw.githubusercontent.com/christkv/tic-tac-toe/master/public/img/circle.png" draggable="true" 
        ondragstart="drag(event)" width="75" height="75" />
    </div>
</body>
</html>
