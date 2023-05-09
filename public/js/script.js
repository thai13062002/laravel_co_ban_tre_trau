document.getElementById("form-child").addEventListener("submit", function(event) {
    alert('con')
    event.preventDefault(); // ngăn chặn sự kiện submit của form con
    // xử lý submit form con ở đây
});

document.getElementById("form-parent").addEventListener("submit", function(event) {
    // xử lý submit form cha ở đây
    alert('cha')


});
