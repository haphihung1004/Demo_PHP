const stars = [...document.getElementsByClassName("fa-star")];
const btnPost = document.getElementById("btnPost");
const commentArea = document.getElementById("commentArea");
let rate = 0;
let firstTime = true;

stars.map((star, index) =>
star.addEventListener("click", function() {
    stars.forEach(star => star.classList.remove("rate"));

    let count = index;
    rate = index + 1;
    while (count >= 0) {
    stars[count--].classList.add("rate");
    }
})
);

stars.map((star, index) =>
star.addEventListener("mouseover", function() {
    stars.forEach(star => star.classList.remove("rate"));

    let count = index;
    rate = 0;
    while (count >= 0) {
    stars[count--].classList.add("rate");
    }
})
);

stars.map(star =>
star.addEventListener("mouseout", function() {
    if (!rate) stars.forEach(star => star.classList.remove("rate"));
})
);

btnPost.addEventListener("click", postComment);

async function postComment() {
// url sẽ xử lý phía server
const url = 'comment.php';

// Chuyển data nhận vào thành kiểu Object để parse sang JSON
const data = {
    productId: productId,
    commentContent: document.getElementById("validationTextarea").value,
    commentRate: rate,
    firstTime: firstTime
};
firstTime = false;

// Gửi request
const req = await fetch(url, {
    method: "POST",
    headers: {
    "Content-Type": "application/json",
    Accept: "application/json"
    },
    body: JSON.stringify(data)
});

// chuyển dữ liệu trả về theo kiểu JSON
const comments = await req.json();
console.log(comments);
let Result = ""; 
comments.forEach(comment => {
    Result += `
    <div class="row" style="padding-top:30px">
        <div class="col-md-2">
            <img src="./../assets/public_user/images/${comment['access_img']}" alt="" class="img-fluid avartar" >
        </div>
        <div class="col-md-3">
            <h4>${comment['comment_user_name']}</h4>
            <ul>
            <li>`;
           
    
    for (let i = 1; i <= comment['comment_rate']; i++) 
    {
        Result +=
        `<i class="fa fa-star rate" aria-hidden="true"></i> `;
    }
   
    Result += `</li>   </ul>
    </div>
      <div class="col-md-3">
         <p> ${comment['comment_content']}</p>
      </div>
  </div>`;
   
    
});
commentArea.innerHTML = Result;
stars.forEach(star => star.classList.remove("rate"));
document.getElementById("validationTextarea").value = "";
}

postComment();