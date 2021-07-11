var child = document.getElementsByClassName('c-flex-item');

function appendRow(){
    var lnChild = child.length;
    var parent = document.getElementsByClassName('c-flex');

    var item = document.createElement("div");
    item.setAttribute('class', 'c-flex-item');

    var label1 = document.createElement("label");
    label1.setAttribute('for', 'word');
    label1.innerHTML = "Word: ";

    var input1 = document.createElement("input");
    input1.setAttribute('type', 'text');
    input1.setAttribute('id', 'word');
    input1.setAttribute('name', 'word_' + (lnChild + 1));

    var exc = document.createElement("a");
    exc.setAttribute('class', 'change');
    exc.innerHTML = "EXCHANGE";

    var label2 = document.createElement("label");
    label2.setAttribute('for', 'answer');
    label2.innerHTML = "Translation: ";

    var input2 = document.createElement("input");
    input2.setAttribute('type', 'text');
    input2.setAttribute('id', 'answer');
    input2.setAttribute('name', 'answer_' + (lnChild + 1));

    parent[0].appendChild(item);
    item.appendChild(label1);
    item.appendChild(input1);
    item.appendChild(exc);
    item.appendChild(label2);
    item.appendChild(input2);

    console.log(parent.length);
    console.log(child.length);

    document.cookie = "c=" + lnChild;
}

function loadJSON(callback) {   

    var xobj = new XMLHttpRequest();
        xobj.overrideMimeType("application/json");
    xobj.open('GET', 'data.json', true); // Replace 'my_data' with the path to your file
    xobj.onreadystatechange = function () {
          if (xobj.readyState == 4 && xobj.status == "200") {
            // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
            callback(xobj.responseText);
          }
    };
    xobj.send(null);  
 }