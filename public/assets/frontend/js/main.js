"use strict";
// const login_switch = document.getElementById('login_switch');
// const register_switch = document.getElementById('register_switch');
const body = document.getElementById('body');
// const cancel = document.getElementById('cancel');
// const reg_cancel = document.getElementById('reg_cancel');
// const login = document.getElementById('login');
// const register = document.getElementById('register');
const article = document.getElementById('article');
const posts = document.getElementById('posts');
const photos = document.getElementById('photos');


const login_form = document.getElementById('login_form');
const forgot_form = document.getElementById('forgot_form');

// const forget = document.getElementById('forget');


// // Login 
// login_switch.addEventListener('click', function(e) {
//     e.preventDefault()
//         // console.log('register_switch');
//     login.classList.toggle("d-none");
//     if (login_form.classList.contains('d-none')) {
//         login_form.classList.remove('d-none');
//     }
//     forgot_form.classList.add("d-none");
//     register.classList.add("d-none");
//     window.location.hash = '#login';

// });

// cancel.addEventListener('click', function(e) {
//     e.preventDefault()
//         // console.log('working');
//     login.classList.toggle("d-none");
//     // body.classList.toggle("d-none");
// });
// // Login end

// // Register 
// register_switch.addEventListener('click', function(e) {
//     e.preventDefault()
//         // console.log('register_switch');
//     register.classList.toggle("d-none");
//     // body.classList.toggle("d-none");
//     login.classList.add("d-none");
//     window.location.hash = '#register';

// });

// reg_cancel.addEventListener('click', function(e) {
//     e.preventDefault()
//         // console.log('register_switch');
//     register.classList.toggle("d-none");
//     // body.classList.remove("d-none");

// });

// function backtologin() {
//     console.log('ssss');
//     login_form.classList.remove('d-none');
//     forgot_form.classList.add('d-none');
// }

// function forget() {
//     login_form.classList.add('d-none');
//     forgot_form.classList.remove('d-none');

// }



// Register end 

// Full Article 


// Full Article end 


// Blog pagination 

const req = new XMLHttpRequest();
const blog_pagination = document.getElementById('blog_pagination');
req.open('GET', '/blog');
req.send();
req.onload = () => {
        // console.log(req);
        if (req.status === 200) {
            // console.log('Success');
            const data = req.response;

            const turn = Math.ceil(data / 6);

            let r = 1;
            for (let i = 1; i < data; i += 4) {

                blog_pagination.innerHTML +=
                    `<button value="blog/${i}/${i + 3}" class="btn border click">${r}</button>`;
                ++r;

            }



            // Hex color 
            const random_hex_color_code = () => {
                let n = (Math.random() * 0xfffff * 1000000).toString(16);
                return '#' + n.slice(0, 6);
            };
            // hex color end 

            // Default blog 
            const requestDefault = new XMLHttpRequest();
            requestDefault.open('GET', '/blog/1/4');
            requestDefault.send();
            requestDefault.onload = () => {
                    if (requestDefault.status === 200) {
                        // console.log('Success');
                        // console.log('/blog/1/4');
                        const data = JSON.parse(requestDefault.response);

                        const obj = Object.entries(data);
                        for (const [x, y] of obj) {
                            // console.log(y);
                            posts.innerHTML +=
                                `
    <span class="col-md-12 col-lg-6 p-2 " id='postElement'>
    <a href="#"  onclick="viewPost(event,${y['id']})" class="text-decoration-none text-dark articles">

        <div class="card p-0 shadow">
            <div class="row g-0 ">

                <div class="col-md-11 ">
                    <div class="card-body ">
                        <h5 class="card-title">${y['title'].substring(0, 50)}...</h5>
                        <p class="card-text">
                        ${y['article'].substring(0, 250)}...
                        </p>
                     
                    </div>
                </div>
                <div class="col-sm-1" style="background: ${random_hex_color_code()}">

                </div>
            </div>
        </div>
    </a>
</span>

    `;
                        }
                    }
                }
                // default blog end 



            // pagination for blog 
            Array.from(document.getElementById('blog_pagination').childNodes).forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.preventDefault()
                    const request = new XMLHttpRequest();
                    request.open('GET', `${element.value}`);
                    request.send();
                    request.onload = () => {
                        if (request.status === 200) {
                            console.log('Success');
                            console.log(element.value);
                            const data = JSON.parse(request.response);
                            posts.innerHTML = '';
                            const obj = Object.entries(data);
                            for (const [x, y] of obj) {
                                // console.log(y);
                                posts.innerHTML +=
                                    `
                        <span class="col-md-12 col-lg-6 p-2 " id='postElement'>
                        <a href=#"  onclick="viewPost(event,${y['id']})"  class="text-decoration-none text-dark articles">

                            <div class="card p-0 shadow">
                                <div class="row g-0 ">

                                    <div class="col-md-11 ">
                                        <div class="card-body ">
                                            <h5 class="card-title">${y['title'].substring(0, 50)}...</h5>
                                            <p class="card-text">
                                            ${y['article'].substring(0, 250)}...
                                            </p>
                                         
                                        </div>
                                    </div>
                                    <div class="col-sm-1" style="background: ${random_hex_color_code()}">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </span>

                        `;
                            }
                        }
                    }
                });
            });
            // pagination for blog end 
            const active = document.getElementsByClassName("click");
            for (let i = 0; i < active.length; i++) {
                active[i].addEventListener('click', toggle)

            }

            function toggle(e) {
                e.preventDefault();



                for (let i = 0; i < active.length; i++) {
                    active[i].addEventListener('click', toggle)

                }
                for (let i = 0; i < active.length; i++) {
                    if (active[i].classList.contains('btn-primary')) {
                        active[i].classList.remove('btn-primary');
                    }

                }

                this.classList.add("btn-primary");

                // console.log('aaaaaaaaa');
            }
        }
    }
    // Blog pagination  end




// / Gallery pagination 

const galleryReq = new XMLHttpRequest();
const gallery_pagination = document.getElementById('gallery_pagination');
galleryReq.open('GET', '/gallery');
galleryReq.send();
galleryReq.onload = () => {
        // console.log(req);
        if (galleryReq.status === 200) {
            // console.log('Success');
            const data = galleryReq.response;

            // const turn = Math.ceil(data / 6);

            let r = 1;
            for (let i = 1; i < data; i += 8) {

                gallery_pagination.innerHTML +=
                    `<button value="gallery/${i}/${i + 7}" class="btn border gclick">${r}</button>`;
                ++r;

            }



            // Default blog 
            const requestDefaultGallery = new XMLHttpRequest();
            requestDefaultGallery.open('GET', '/gallery/1/8');
            requestDefaultGallery.send();
            requestDefaultGallery.onload = () => {
                    if (requestDefaultGallery.status === 200) {
                        // console.log('Success');
                        // console.log('/blog/1/4');
                        const data = JSON.parse(requestDefaultGallery.response);
                        // console.log(data);
                        const obj = Object.entries(data);
                        for (const [x, y] of obj) {
                            // console.log(y);
                            photos.innerHTML +=
                                `
                                <span class="col-xs-12 col-md-4 col-lg-3 p-3">
                                <img src="assets/frontend/images/gallery/${y['image_url']}"
                                    class="img-thumbnail border-0 shadow biggy">
                                </span>
                                `;
                        }
                    }
                }
                // default blog end 



            // pagination for blog 
            Array.from(document.getElementById('gallery_pagination').childNodes).forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.preventDefault()
                    const requestGalleryPagination = new XMLHttpRequest();


                    requestGalleryPagination.open('GET', `${element.value}`);
                    requestGalleryPagination.send();


                    requestGalleryPagination.onload = () => {
                        if (requestGalleryPagination.status === 200) {
                            console.log('Success');
                            console.log(element.value);
                            const data = JSON.parse(requestGalleryPagination.response);
                            photos.innerHTML = '';
                            const obj = Object.entries(data);
                            for (const [x, y] of obj) {
                                // console.log(y);
                                photos.innerHTML +=
                                    `
                                <span class="col-xs-12 col-md-4 col-lg-3 p-3">
                                <img src="assets/frontend/images/gallery/${y['image_url']}"
                                    class="img-thumbnail border-0 shadow biggy">
                                </span>
                                `;
                            }




                        }

                    }
                });
            });
            // pagination for blog end 
            const active = document.getElementsByClassName("gclick");
            for (let i = 0; i < active.length; i++) {
                active[i].addEventListener('click', toggle)

            }

            function toggle(e) {
                e.preventDefault();



                for (let i = 0; i < active.length; i++) {
                    active[i].addEventListener('click', toggle)

                }
                for (let i = 0; i < active.length; i++) {
                    if (active[i].classList.contains('btn-primary')) {
                        active[i].classList.remove('btn-primary');
                    }

                }

                this.classList.add("btn-primary");

                // console.log('aaaaaaaaa');
            }
        }
    }
    // Blog pagination  end


// View Post 
const VPost = document.getElementById('article');

function viewPost(event, id) {
    event.preventDefault()
    VPost.innerHTML = '';
    const requestViewPost = new XMLHttpRequest();
    requestViewPost.open('GET', `/blog/${id}`);
    requestViewPost.send();
    requestViewPost.onload = () => {
        if (requestViewPost.status === 200) {
            // console.log('Success');
            // console.log(element.value);
            const data = JSON.parse(requestViewPost.response);
            console.log(data);

            const obj = Object.entries(data);
            for (const [x, y] of obj) {
                // console.log(y);
                VPost.innerHTML =
                    `
                    <div class="card w-50 m-auto my-5 shadow-lg">
                    <div class="card-header">
                        
                        <button class="btn btn-light  float-end" id="blog_cancel"><i class="fa-solid fa-xmark"
                                width="20px"></i></button>
                    </div>
                    <img src="${y['img_url']}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title py-4"> <strong>${y['title']}</strong></h5>
                        <p class="card-text"> ${y['article']}  </p>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
                `;

                body.classList.add('d-none');
                const blog_cancel = document.getElementById('blog_cancel');

                blog_cancel.addEventListener('click', function(e) {
                    e.preventDefault();
                    body.classList.remove("d-none");
                    article.innerHTML = "";
                });
            }
        }
    }

}
// View Post End