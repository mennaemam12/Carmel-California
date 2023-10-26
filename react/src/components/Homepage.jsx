import { Outlet, Navigate, Link } from "react-router-dom";
import { useStateContext } from "../contexts/ContextProvider";
import React from 'react';
// import '../css/open-iconic-bootstrap.min.css';
// import '../css/animate.css';
// import '../css/owl.carousel.min.css';
// import '../css/owl.theme.default.min.css';
// import '../css/magnific-popup.css';
// import '../css/aos.css';
// import '../css/ionicons.min.css';
// import '../css/bootstrap-datepicker.css';
// import '../css/jquery.timepicker.css';
// import '../css/flaticon.css';
// import '../css/icomoon.css';
import '../css/style.css';

// import '../css/js/jquery.min.js';
// import '../css/js/jquery-migrate-3.0.1.min.js';
// import '../css/js/popper.min.js';
// import '../css/js/bootstrap.min.js';
// import '../css/js/jquery.easing.1.3.js';
// import '../css/js/jquery.waypoints.min.js';
// import '../css/js/jquery.stellar.min.js';
// import '../css/js/owl.carousel.min.js';
// import '../css/js/jquery.magnific-popup.min.js';
// import '../css/js/aos.js';
// import '../css/js/jquery.animateNumber.min.js';
// import '../css/js/bootstrap-datepicker.js';
// import '../css/js/jquery.timepicker.min.js';
// import '../css/js/scrollax.min.js';
// import '../css/js/main.js';
// import '../css/js/google-map.js';

const NavBar = () =>{
    const navbarStyle = {
        backgroundColor: 'rgb(193, 171, 143)',
      };
    
      const menuIconStyle = {
        color: '#504831',
      };
    return (
            <nav className="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style={navbarStyle}>
                <div className="container">
                    <a className="navbar-brand" href="index.html">Carmel<small>California</small></a>
                    <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="oi oi-menu" style={menuIconStyle}></span> Menu
                    </button>
                    <div className="collapse navbar-collapse" id="ftco-nav">
                        <ul className="navbar-nav ml-auto">
                            <li className="nav-item active"><a href="index.html" className="nav-link">Home</a></li>
                            <li className="nav-item"><a href="menu.html" className="nav-link">Menu</a></li>
                            <li className="nav-item"><a href="services.html" className="nav-link">Services</a></li>
                            <li className="nav-item"><a href="blog.html" className="nav-link">Blog</a></li>
                            <li className="nav-item"><a href="about.html" className="nav-link">About</a></li>
                            <li className="nav-item dropdown">
                                <a className="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                                <div className="dropdown-menu" aria-labelledby="dropdown04">
                                    <a className="dropdown-item" href="shop.html">Shop</a>
                                    <a className="dropdown-item" href="product-single.html">Single Product</a>
                                    <a className="dropdown-item" href="room.html">Cart</a>
                                    <a className="dropdown-item" href="checkout.html">Checkout</a>
                                    <a className="dropdown-item" href="login.html">Sign In</a>
                                </div>
                            </li>
                            <li className="nav-item"><a href="contact.html" className="nav-link">Contact</a></li>
                            <li className="nav-item cart">
                                <a href="cart.html" className="nav-link">
                                    <span className="icon icon-shopping_cart"></span>
                                    <span className="bag d-flex justify-content-center align-items-center"><small>1</small></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

    )
}

const HomeSlider = () => {
    return (
      <section className="home-slider owl-carousel">
        <div className="slider-item" style={{ backgroundImage: 'url(src/images/bg_1.jpg)' }}>
          <div className="overlay"></div>
          <div className="container">
            <div className="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
              <div style={{ zIndex: 0, padding: '30px', borderRadius: '10px', textAlign: 'center' }}>
                <div style={{ zIndex: 0 }}>
                  <span className="subheading">Welcome</span>
                  <h1 className="mb-4">Discover Carmel, <br />California's flavors now in Cairo</h1>
                  <p className="mb-4 mb-md-5"></p>
                  <p><a href="#" className="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" className="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div className="slider-item" style={{ backgroundImage: 'url(src/images/bg_6.jpg)' }}>
          <div className="overlay"></div>
          <div className="container">
            <div className="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
              <div style={{ zIndex: 0, padding: '30px', borderRadius: '10px', textAlign: 'center' }}>
                <div style={{ zIndex: 0 }}>
                  <span className="subheading">Welcome</span>
                  <h1 className="mb-4">Discover Carmel, <br />California's flavors now in Cairo</h1>
                  <p className="mb-4 mb-md-5"></p>
                  <p><a href="#" className="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" className="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div className="slider-item" style={{ backgroundImage: 'url(src/images/bg_3.jpg)' }}>
          <div className="overlay"></div>
          <div className="container">
            <div className="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
              <div style={{ zIndex: 0, padding: '30px', borderRadius: '10px', textAlign: 'center' }}>
                <div style={{ zIndex: 0 }}>
                  <span className="subheading">Welcome</span>
                  <h1 className="mb-4">Discover Carmel, <br />California's flavors now in Cairo</h1>
                  <p className="mb-4 mb-md-5"></p>
                  <p><a href="#" className="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" className="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    );
  };
  
  const OurStory = () => {
    return (
      <section className="ftco-about d-md-flex">
        <div className="one-half img" style={{ backgroundImage: 'url(src/images/bgstory_3.jpg)', backgroundSize: '88%' }}></div>
        <div className="one-half ftco-animate">
          <div className="overlap">
            <div className="heading-section ftco-animate">
              <span className="subheading">Discover</span>
              <h2 className="mb-4">Our Story</h2>
            </div>
            <div>
              <p>Born in 2021, Carmel is inspired by a small beach city in the "Golden State California, famous for its white sand, small cottages, and a breathtaking picturesque scenic road".</p>
              <p>Being an artisanal boutique, we start off with a carefully crafted mood, to match a wide offering of artisanal pastries, bakery, cakes, in addition to a selective all-day menu.</p>
              <p>Join us in the Golden State of mind, where all good things collide.</p>
            </div>
          </div>
        </div>
      </section>
    );
  };

  const MenuSection= () => {
    return (
      <section className="ftco-section">
        <div className="container">
          <div className="row align-items-center">
            <div className="col-md-6 pr-md-5">
              <div className="heading-section text-md-right ftco-animate">
                <span className="subheading">Quality guaranteed</span>
                <h2 className="mb-4">Our Menu</h2>
                <p className="mb-4">All our items are handmade, working with speciality farmers and gourmet suppliers to ensure that our raw materials are up to our premium standard. Carmel's team cares about your experience and offers a 100% guarantee policy.</p>
                <p><a href="#" className="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
              </div>
            </div>
            <div className="col-md-6">
              <div className="row">
                <div className="col-md-6">
                  <div className="menu-entry">
                    <a href="#" className="img" style={{ backgroundImage: 'url(src/images/menu-1.jpg)' }}></a>
                  </div>
                </div>
                <div className="col-md-6">
                  <div className="menu-entry mt-lg-4">
                    <a href="#" className="img" style={{ backgroundImage: 'url(src/images/menu-2.jpg)' }}></a>
                  </div>
                </div>
                <div className="col-md-6">
                  <div className="menu-entry">
                    <a href="#" className="img" style={{ backgroundImage: 'url(src/images/menu-3.jpg)' }}></a>
                  </div>
                </div>
                <div className="col-md-6">
                  <div className="menu-entry mt-lg-4">
                    <a href="#" className="img" style={{ backgroundImage: 'url(src/images/menu-4.jpg)' }}></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    );
  }
  
  const CounterSection = () =>{
    return (
      <section className="ftco-section" id="section-counter" style={{ padding: '30px' }}>
        <div className="overlay"></div>
        <div className="container">
          <div className="row justify-content-center">
            {/* Add content for the counter section if needed */}
          </div>
        </div>
      </section>
    );
  }






  const MenuPics = [
    { image: 'src/images/menu-1.jpg', title: 'Coffee Cappuccino', description: 'A small river named Duden flows by their place and supplies', price: '$5.90' },
    { image: 'src/images/menu-2.jpg', title: 'Coffee Cappuccino', description: 'A small river named Duden flows by their place and supplies', price: '$5.90' },
    { image: 'src/images/menu-3.jpg', title: 'Coffee Cappuccino', description: 'A small river named Duden flows by their place and supplies', price: '$5.90' },
    { image: 'src/images/menu-4.jpg', title: 'Coffee Cappuccino', description: 'A small river named Duden flows by their place and supplies', price: '$5.90' }
  ];
  
  const galleryImages = [
    'src/images/gallery-1.jpg',
    'src/images/gallery-2.jpg',
    'src/images/gallery-3.jpg',
    'src/images/gallery-4.jpg'
  ];
  
  const FeaturedMenuSection = () => {
    return (
      <section className="ftco-section">
        <div className="container">
          <div className="row justify-content-center mb-5 pb-3">
            <div className="col-md-7 heading-section ftco-animate text-center">
              <span className="subheading">Featured</span>
              <h2 className="mb-4">Best Coffee Sellers</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <div className="row">
            {MenuPics.map((item, index) => (
              <div className="col-md-3" key={index}>
                <div className="menu-entry">
                  <a href="#" className="img" style={{ backgroundImage: `url(${item.image})` }}></a>
                  <div className="text text-center pt-4">
                    <h3><a href="#">{item.title}</a></h3>
                    <p>{item.description}</p>
                    <p className="price"><span>{item.price}</span></p>
                    <p><a href="#" className="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>
    );
  }
  
  const GallerySection = () => {
    return (
      <section className="ftco-gallery">
        <div className="container-wrap">
          <div className="row no-gutters">
            {galleryImages.map((image, index) => (
              <div className="col-md-3 ftco-animate" key={index}>
                <a href="gallery.html" className="gallery img d-flex align-items-center" style={{ backgroundImage: `url(${image})` }}>
                  <div className="icon mb-4 d-flex align-items-center justify-content-center">
                    <span className="icon-search"></span>
                  </div>
                </a>
              </div>
            ))}
          </div>
        </div>
      </section>
    );
  }








  const MenuItems = [
    {
      category: 'Main Dish',
      items: [
        {
          image: 'src/images/dish-1.jpg',
          title: 'Grilled Beef',
          description: 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
          price: '$2.90',
        },
        {
          image: 'src/images/dish-2.jpg',
          title: 'Grilled Beef',
          description: 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
          price: '$2.90',
        },
        {
          image: 'src/images/dish-3.jpg',
          title: 'Grilled Beef',
          description: 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
          price: '$2.90',
        },
      ],
    },
    {
      category: 'Drinks',
      items: [
        {
          image: 'src/images/drink-1.jpg',
          title: 'Lemonade Juice',
          description: 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
          price: '$2.90',
        },
        {
          image: 'src/images/drink-2.jpg',
          title: 'Pineapple Juice',
          description: 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
          price: '$2.90',
        },
        {
          image: 'src/images/drink-3.jpg',
          title: 'Soda Drinks',
          description: 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
          price: '$2.90',
        },
      ],
    },
    {
      category: 'Desserts',
      items: [
        {
          image: 'src/images/dessert-1.jpg',
          title: 'Hot Cake Honey',
          description: 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
          price: '$2.90',
        },
        {
          image: 'src/images/dessert-2.jpg',
          title: 'Hot Cake Honey',
          description: 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
          price: '$2.90',
        },
        {
          image: 'src/images/dessert-3.jpg',
          title: 'Hot Cake Honey',
          description: 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
          price: '$2.90',
        },
      ],
    },
  ];
  
  const ProductsMenuSection = () => {
    return (
      <section className="ftco-menu">
        <div className="container">
          <div className="row justify-content-center mb-5">
            <div className="col-md-7 heading-section text-center ftco-animate">
              <span className="subheading">Discover</span>
              <h2 className="mb-4">Our Products</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <div className="row d-md-flex">
            <div className="col-lg-12 ftco-animate p-md-5">
              <div className="row">
                <div className="col-md-12 nav-link-wrap mb-5">
                  <div className="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    {MenuItems.map((category, index) => (
                      <a
                        key={index}
                        className={`nav-link ${index === 0 ? 'active' : ''}`}
                        id={`v-pills-${index + 1}-tab`}
                        data-toggle="pill"
                        href={`#v-pills-${index + 1}`}
                        role="tab"
                        aria-controls={`v-pills-${index + 1}`}
                        aria-selected={index === 0}
                      >
                        {category.category}
                      </a>
                    ))}
                  </div>
                </div>
                <div className="col-md-12 d-flex align-items-center">
                  <div className="tab-content ftco-animate" id="v-pills-tabContent">
                    {MenuItems.map((category, index) => (
                      <div
                        key={index}
                        className={`tab-pane fade ${index === 0 ? 'show active' : ''}`}
                        id={`v-pills-${index + 1}`}
                        role="tabpanel"
                        aria-labelledby={`v-pills-${index + 1}-tab`}
                      >
                        <div className="row">
                          {category.items.map((item, itemIndex) => (
                            <div key={itemIndex} className="col-md-4 text-center">
                              <div className="menu-wrap">
                                <a href="#" className="menu-img img mb-4" style={{ backgroundImage: `url(${item.image})` }}></a>
                                <div className="text">
                                  <h3><a href="#">{item.title}</a></h3>
                                  <p>{item.description}</p>
                                  <p className="price"><span>{item.price}</span></p>
                                  <p><a href="#" className="btn btn-primary btn-outline-primary">Add to cart</a></p>
                                </div>
                              </div>
                            </div>
                          ))}
                        </div>
                      </div>
                    ))}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    );
  }


  const TestimonialSection = () => {
    return (
        <section className="ftco-section img" id="ftco-testimony" style={{ backgroundImage: "url(src/images/cover2.jpg)", backgroundSize: "cover" }} data-stellar-background-ratio="0.5">
            <div className="overlay"></div>
            <div className="container">
                <div className="row justify-content-center mb-5">
                    <div className="col-md-7 heading-section text-center ftco-animate">
                        <span className="subheading">Testimony</span>
                        <h2 className="mb-4">Customers Says</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
            </div>
            <div className="container-wrap">
                <div className="row d-flex no-gutters">
                    <div className="col-lg align-self-sm-end ftco-animate">
                        <div className="testimony">
                            <blockquote>
                                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small.&rdquo;</p>
                            </blockquote>
                            <div className="author d-flex mt-4">
                                <div className="image mr-3 align-self-center">
                                    <img src="src/images/person_3.jpg" alt="" />
                                </div>
                                <div className="name align-self-center">Louise Kelly <span className="position">Illustrator Designer</span></div>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg align-self-sm-end">
                        <div className="testimony overlay">
                            <blockquote>
                                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
                            </blockquote>
                            <div className="author d-flex mt-4">
                                <div className="image mr-3 align-self-center">
                                    <img src="src/images/person_2.jpg" alt="" />
                                </div>
                                <div className="name align-self-center">Louise Kelly <span className="position">Illustrator Designer</span></div>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg align-self-sm-end ftco-animate">
                        <div className="testimony">
                            <blockquote>
                                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name.&rdquo;</p>
                            </blockquote>
                            <div className="author d-flex mt-4">
                                <div className="image mr-3 align-self-center">
                                    <img src="src/images/person_3.jpg" alt="" />
                                </div>
                                <div className="name align-self-center">Louise Kelly <span className="position">Illustrator Designer</span></div>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg align-self-sm-end">
                        <div className="testimony overlay">
                            <blockquote>
                                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however.&rdquo;</p>
                            </blockquote>
                            <div className="author d-flex mt-4">
                                <div className="image mr-3 align-self-center">
                                    <img src="src/images/person_2.jpg" alt="" />
                                </div>
                                <div className="name align-self-center">Louise Kelly <span className="position">Illustrator Designer</span></div>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg align-self-sm-end ftco-animate">
                        <div className="testimony">
                            <blockquote>
                                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name.&rdquo;</p>
                            </blockquote>
                            <div className="author d-flex mt-4">
                                <div className="image mr-3 align-self-center">
                                    <img src="src/images/person_3.jpg" alt="" />
                                </div>
                                <div className="name align-self-center">Louise Kelly <span className="position">Illustrator Designer</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
};


  const Footer = () => {
    return (
      <footer className="ftco-footer ftco-section img">
        <div className="overlay"></div>
        <div className="container">
          <div className="row mb-5">
            <div className="col-lg-3 col-md-6 mb-5 mb-md-5">
              <div className="ftco-footer-widget mb-4">
                <h2 className="ftco-heading-2">About Us</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <ul className="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                  <li className="ftco-animate"><a href="#"><span className="icon-twitter"></span></a></li>
                  <li className="ftco-animate"><a href="#"><span className="icon-facebook"></span></a></li>
                  <li className="ftco-animate"><a href="#"><span className="icon-instagram"></span></a></li>
                </ul>
              </div>
            </div>
            <div className="col-lg-4 col-md-6 mb-5 mb-md-5">
              <div className="ftco-footer-widget mb-4">
                <h2 className="ftco-heading-2">Recent Blog</h2>
                <div className="block-21 mb-4 d-flex">
                  <a className="blog-img mr-4" style={{ backgroundImage: 'url(src/images/image_1.jpg)' }}></a>
                  <div className="text">
                    <h3 className="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                    <div className="meta">
                      <div><a href="#"><span className="icon-calendar"></span> Sept 15, 2018</a></div>
                      <div><a href="#"><span className="icon-person"></span> Admin</a></div>
                      <div><a href="#"><span className="icon-chat"></span> 19</a></div>
                    </div>
                  </div>
                </div>
                <div className="block-21 mb-4 d-flex">
                  <a className="blog-img mr-4" style={{ backgroundImage: 'url(src/images/image_2.jpg)' }}></a>
                  <div className="text">
                    <h3 className="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                    <div className="meta">
                      <div><a href="#"><span className="icon-calendar"></span> Sept 15, 2018</a></div>
                      <div><a href="#"><span className="icon-person"></span> Admin</a></div>
                      <div><a href="#"><span className="icon-chat"></span> 19</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-lg-2 col-md-6 mb-5 mb-md-5">
              <div className="ftco-footer-widget mb-4 ml-md-4">
                <h2 className="ftco-heading-2">Services</h2>
                <ul className="list-unstyled">
                  <li><a href="#" className="py-2 d-block">Cooked</a></li>
                  <li><a href="#" className="py-2 d-block">Deliver</a></li>
                  <li><a href="#" className="py-2 d-block">Quality Foods</a></li>
                  <li><a href="#" className="py-2 d-block">Mixed</a></li>
                </ul>
              </div>
            </div>
            <div className="col-lg-3 col-md-6 mb-5 mb-md-5">
              <div className="ftco-footer-widget mb-4">
                <h2 className="ftco-heading-2">Have a Questions?</h2>
                <div className="block-23 mb-3">
                  <ul>
                    <li><span className="icon icon-map-marker"></span><span className="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                    <li><a href="#"><span className="icon icon-phone"></span><span className="text">+2 392 3929 210</span></a></li>
                    <li><a href="#"><span className="icon icon-envelope"></span><span className="text">info@yourdomain.com</span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div className="row">
            <div className="col-md-12 text-center">
              <p>
                {/* Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. */}
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i className="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                {/* Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. */}
              </p>
            </div>
          </div>
        </div>
      </footer>
    );
  }
  
  
  
  export default function Homepage() {
    return (
      <div>
        <NavBar/>
        <HomeSlider/>
        <OurStory/>
        <MenuSection/>
        <CounterSection />
        <FeaturedMenuSection/>
        <GallerySection/>
        <ProductsMenuSection/>
        <TestimonialSection/>
        <Footer/>
      </div>
    );
  }