/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
for (var i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.innerHTML.includes("href")) {
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
                this.children[0].classList.remove('fa-minus');
                this.children[0].classList.add('fa-plus');
            } else {
                dropdownContent.style.display = "block";
                this.children[0].classList.remove('fa-plus');
                this.children[0].classList.add('fa-minus');
            }
        }
    });
}

for (var i = 0; i < dropdown.length; i++) {
    var child = dropdown[i].nextElementSibling;
    var title = document.getElementById("learning-title").innerHTML;
    var val = (String(child.innerHTML)).trim();
    var childNodes = child.childNodes;
    for (var j = 0; j < childNodes.length; j++) {
        if (typeof(childNodes[j].innerHTML) != "undefined") {
            if (childNodes[j].innerHTML.includes(title)) {
                dropdown[i].click();
                childNodes[j].classList.add("active");
                break;
            }
        }
    }
}