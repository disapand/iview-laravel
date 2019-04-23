<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width,initial-scale=1,user-scalable=no" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="format-detection" content="telephone=no,address=no">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/index.css')  }}">
    <title>ZETIN MEDIA GROUP</title>
</head>

<body>
<div id="app">
    <header class="header">
        <div class="header-container">
            <div class="top-bar">
                <div class="menu">
                    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
                        <div class="container">
                            <div class="navbar-header">

                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                        data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>


                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding:30px;">
                                <div class="img-container">
                                    <img src="{{ asset('images/english/images/logo.png') }}" alt="">
                                    <div
                                            style="font-size: 14px; font-weight: 700; text-indent: 5px; letter-spacing: 3.5px;">
                                        <a href="javascript:void(0);" style="color: #999;text-decoration: none;cursor:
                        default;">ENGLISH</a>&nbsp;|
                                        <a href="{{  route('home') }}" style="color: #000;text-decoration: none;">中文版</a>
                                    </div>
                                </div>
                                <ul class="nav navbar-nav" id="nav">

                                    <li><a class="nav-about nav-active" style="font-weight:bold;"> ABOUT US </a></li>
                                    <li><a class="nav-res" style="font-weight:bold;"> RESOURCES </a></li>
                                    <li><a class="nav-compagin" style="font-weight:bold;"> COMPAGIN </a></li>
                                    <li><a class="nav-clients" style="font-weight:bold;"> CLIENTS </a></li>
                                    <li><a class="nav-contact" style="font-weight:bold;"> Contact </a></li>
                                </ul>
                            </div>
                            <div class="text">
                                <h1 class="title">
                                    INTERNATIONAL AGENCY
                                </h1>
                                <h1 class="title">
                                    FOR CHINESE BRANDS
                                </h1>
                            </div>

                            <div class="des">
                                <h3 class="global-view">
                                    Global Team,Global Views
                                </h3>
                                <h3 class="local">
                                    Localized Strategy, Localized Service
                                </h3>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="body">
        <div class="container-fluid">
            <div class="container" id="about">
                <h1 class="about-us san">ABOUT US</h1>
                <div class="profile-container">
                    <img src="{{ asset('images/english/images/about_img.png') }}" alt="" class="about-img">
                    <div class="right-part-text">
                        <h3 class="company-profile sub-title">
                            COMPANY PROFILE
                        </h3>
                        <h6 class="detail">
                            Zetin Group is the first media organization in China that focuses on overseas marketing for brands, an
                            interactive advertising marketing service provider that internationalize Chinese products by both
                            branding
                            and performance marketing. We specialize in providing global marketing and promotion services for mobile
                            applications, mobile games, e-commerce platforms, tourism, products, and else. Zetin has an
                            international
                            view and localization advantages, and is committed to helping many customers win overseas markets. With
                            a
                            huge set of high quality media resources all over the world and global media resource gallery, we
                            provide
                            strong support to advertise your brands and products. Through multi-channel promotion strategies such as
                            social marketing, event promotion, media placement, digital and traditional ads, etc., and the
                            three-dimensional content integration of your products, we will enhance the market position of products
                            more accurately and effectively to meet customer demands. Zetin Group is doing business realizing our
                            value by customized service, which is based on a global perspective and customer insights.
                        </h6>
                    </div>
                </div>


            </div>
            <div class="team-intro row ">
                <h3 class="introduction sub-title">
                    TEAM INTRODUCTION
                </h3>
                <div class="row">
                    <div class="intro-item col-sm-3">
                        <img src="{{ asset('images/english/images/team.png')  }}" alt="" class="item-img">
                        <h3 class="sub-title">Team</h3>
                        <p class="intro-detail">
                            45 high-quality employees from all over the world.
                        </p>
                    </div>
                    <div class="intro-item col-sm-3">
                        <img src="{{ asset('images/english/images/globalization.png')  }}" alt="" class="item-img">
                        <h3 class="sub-title">Globalization</h3>
                        <p class="intro-detail">
                            Offices in Hong Kong, Jakarta, New Delhi, Moscow, Los Angeles, and London.
                        </p>
                    </div>
                    <div class="intro-item col-sm-3">
                        <img src="{{ asset('images/english/images/professional.png')  }}" alt="" class="item-img">
                        <h3 class="sub-title">Professional</h3>
                        <p class="intro-detail">
                            Focus on brand promotion in the sea, expert staff, who have more than 10 years’ experience in the
                            Internet, tourism, media advertising and other fields.
                        </p>
                    </div>
                    <div class="intro-item col-sm-3">
                        <img src="{{ asset('images/english/images/resources.png') }}" alt="" class="item-img">
                        <h3 class="sub-title">Resources</h3>
                        <p class="intro-detail">
                            Localized high-quality resources, close cooperation with top media of more than 100 countries around the
                            world.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="our-resources" id="resource">
            <div class="container row">
                <div class="col-lg-4">
                    <h1 class="title">
                        OUR RESOURCES
                    </h1>
                    <p class="detail">
                        Zetin Group is the first media organization in China that focuses on overseas marketing for brands, an
                        interactive advertising marketing service provider that internationalize Chinese products by both branding
                        and performance marketing.
                    </p>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">More About Us</button>
                </div>
                <div class="col-lg-6 resource-images ">
                    <div class="flex-resource-image"><img src="{{ asset('images/english/images/PrintMedia.png') }}" alt="">
                        <h3 class="res-title">Print Media</h3>
                    </div>
                    <div class="flex-resource-image"><img src="{{ asset('images/english/images/TVCommercial.png') }}" alt="">
                        <h3 class="res-title">TV Commercial</h3>
                    </div>
                    <div class="flex-resource-image"><img src="{{ asset('images/english/images/OOH.png') }}" alt="">
                        <h3 class="res-title">OOH</h3>
                    </div>
                    <div class="flex-resource-image"><img src="{{ asset('images/english/images/TransportAds.png') }}" alt="">
                        <h3 class="res-title">Transport Ads</h3>
                    </div>
                    <div class="flex-resource-image"><img src="{{ asset('images/english/images/Online.png') }}" alt="">
                        <h3 class="res-title">Online</h3>
                    </div>
                    <div class="flex-resource-image"><img src="{{ asset('images/english/images/Influencer.png') }}" alt="">
                        <h3 class="res-title">Influencer</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="services-container body-section-wrapper">
            <h1 class="service-tittle">
                SERVICES
            </h1>
            <div class="gallery">
                <div class="flex-container">
                    <div class="flex-slide home">
                        <div class="flex-title flex-title-Strategy">Creative Strategy</div>
                        <div class="flex-about flex-about-Strategy ">
                            <p>We are committed to helping our customers develop positioning strategies different from their
                                competitors, providing brand planning and management services with innovative ideas, connecting with
                                consumers, and ultimately put the marketable and influential creative ideas into practice.</p>
                        </div>
                    </div>
                    <div class="flex-slide pr">
                        <div class="flex-title">Public Relations</div>
                        <div class="flex-about">
                            <p>With massive global media and platform resources, we optimize the ROI by providing you with
                                professional
                                Press
                                Release strategies, including media channels and propaganda cycle. Meanwhile, we help client to
                                achieve
                                highly-efficient communications by choosing different types of advertorials or editorials, the
                                optimal
                                media
                                placement package.</p>
                        </div>
                    </div>
                    <div class="flex-slide work">
                        <div class="flex-title">Media Placement</div>
                        <div class="flex-about">
                            <p>With vast media resources covering many countries and regions in the world, from offline to
                                online, from
                                traditional
                                media to Internet media and the emerging we-media, we recommend the optimal media placement plan
                                after a
                                comprehensive assessment of the total audience, effective audience, audience profile,
                                geographical
                                characteristics
                                of the media itself, and unit advertising cost, advertising period analysis, etc.</p>
                        </div>
                    </div>
                    <div class="flex-slide contact">
                        <div class="flex-title">Event Execution</div>
                        <div class="flex-about">
                            <p>We can manage a series of events such as conferences, forums, publicity, and promotions. We
                                conceive,
                                create and
                                manage these activities through integrated communication plan and on-site management. Enhancing
                                consumers’
                                experience at the event is what we are good at, so we can generate revenue and profit for the
                                brand
                                through the
                                event.</p>
                        </div>
                    </div>

                    <div class="flex-slide influnce">
                        <div class="flex-title">Influencers Agentr</div>
                        <div class="flex-about">
                            <p>We have wide and close connection to Influencers all around the world. Key Opinion Leaders
                                (KOL),
                                generates
                                time-efficient content through the establishment of close ties with them. We help brands develop
                                social
                                media
                                operation strategies, enhance interaction with consumers, and build a brand image.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="campagin-background" id="compagin">
            <div class="campagin-container body-section-wrapper">
                <h1 class="title san level-1-title">CAMPAIGN</h1>
                <div class="campagin-gallery">
                    <div class="campagin-gallery-image">
                        <div class="text-wrapper">
                            <h4>Oneplus——India——Flagship Store Opening Ceremony</h4>
                            <h6>Packing Oneplus flagship store into a New Year’s gift, making a stir on the most prosperous street
                                in Bangalore</h6>
                        </div>
                    </div>
                    <div class="campagin-gallery-image">
                        <div class="text-wrapper">
                            <h4>Metisu——Europe,America——KOL Promotion</h4>
                            <h6>A collection of 100 European and American fashion influencers, promote the brand on social media
                            </h6>
                        </div>
                    </div>
                    <div class="campagin-gallery-image">
                        <div class="text-wrapper">
                            <h4>Airbnb——China——Daily Public Relations Activities</h4>
                            <h6>Chinese localization promotion for a international brand</h6>
                        </div>
                    </div>
                    <div class="campagin-gallery-image">
                        <div class="text-wrapper">
                            <h4>Film Dominator——New York——Nasdaq Digital Boards</h4>
                            <h6>Chinese film unveiled at the crossroads of the world</h6>
                        </div>
                    </div>
                    <div class="campagin-gallery-image">
                        <div class="text-wrapper">
                            <h4>Music APP——Poland——OOH</h4>
                            <h6>OOH advertising in subway to echance brand awareness</h6>
                        </div>
                    </div>
                    <div class="campagin-gallery-image">
                        <div class="text-wrapper">
                            <h4>Sichuan Tourism Development Commission——Italy,Poland,Czech Republic ——OOH</h4>
                            <h6>Bus advertising, the image of the Hometown of Pandas Shuttles through the streets of Europe
                            </h6>
                        </div>
                    </div>
                    <div class="campagin-gallery-image">
                        <div class="text-wrapper">
                            <h4>Hainan Tourism Development Commission——Russia——OOH+Magazine+Online Advertising</h4>
                            <h6>Integrate media resources, optimize the plan to enhance Hainan's tourism image online and offline
                            </h6>
                        </div>
                    </div>
                    <div class="campagin-gallery-image">
                        <div class="text-wrapper">
                            <h4>UC news——India——TV Integration in news programs</h4>
                            <h6>The deep integration in the most influential Hindi news programs in India has made UC news quickly
                                localized, and its
                                brand awareness and reputation have increased dramatically.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clients-background" id="clients">
            <div class="campagin-container body-section-wrapper">
                <h1 class="title san level-1-title">CLIENTS</h1>
                <div class="flex-wrapper" id="clients1">
                    <div class="image"><img src="{{ asset('images/english/images/baca.png') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/tripadvisor.png') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/SHAREit.png') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/metisu.png') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/guojia.jpg') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/umass.jpg') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/shandong.jpg') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/sichuan.jpg') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/elex.jpg') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/faw.jpg') }}" alt=""></div>
                </div>

                <div class="flex-wrapper" id="clients2" style="padding-bottom: 50px;">
                    <div class="image"><img src="{{ asset('images/english/images/gunsofboom.png') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/hainan.png') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/oneplus.png') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/UCNews.png') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/dalian.jpg') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/xender.jpg') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/king.jpg') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/kenya.png') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/beijing.jpg') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('images/english/images/haikou.png') }}" alt=""></div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<footer class="footer " id="contact">
    <div class="container">
        <h1 class="title san">CONTACT US</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-12 directory-item">
                    ABOUT US
                    <img src="{{ asset('images/english/images/arrow.png') }}" alt="" style="margin-left: 3px; color: rgba(255, 255, 255, 0.6);;">
                </div>
                <div class="col-md-12 directory-item">
                    ABOUT US
                    <img src="{{ asset('images/english/images/arrow.png') }}" alt="" style="margin-left: 3px; color: rgba(255, 255, 255, 0.6);;">
                </div>
                <div class="col-md-12 directory-item">
                    ABOUT US
                    <img src="{{ asset('images/english/images/arrow.png') }}" alt="" style="margin-left: 3px; color: rgba(255, 255, 255, 0.6);;">
                </div>
                <div class="col-md-12 directory-item">
                    ABOUT US
                    <img src="{{ asset('images/english/images/arrow.png') }}" alt="" style="margin-left: 3px; color: rgba(255, 255, 255, 0.6);;">
                </div>
                <div class="col-md-12 directory-item">
                    ABOUT US
                    <img src="{{ asset('images/english/images/arrow.png') }}" alt="" style="margin-left: 3px; color: rgba(255, 255, 255, 0.6);;">
                </div>
            </div>

            <div class="col-md-4 contact-info">
                <p class="address">
                    Building B Ruichuang Center,
                </p>
                <p class="address"> Wangjing East Road,</p>
                <p class="address"> Chaoyang District,</p>
                <p class="address"> Beijing, 100102,</p>
                <p class="tel">+86 10 8417 7927</p>
                <p class="mail">info@zetin.cn</p>

                <div class="social-media col-md-12">
                    <div class="col-lg-2"><img src="{{ asset('images/english/images/Facebook.png') }}" alt=""></div>
                    <div class="col-lg-2"><img src="{{ asset('images/english/images/Ins.png') }}" alt=""></div>
                    <div class="col-lg-2"><img src="{{ asset('images/english/images/Pinterest.png') }}" alt=""></div>
                    <div class="col-lg-2"><img src="{{ asset('images/english/images/YouTube.png') }}" alt=""></div>
                </div>


            </div>

            <div class="location-map col-md-4">
                <img src="{{ asset('images/english/images/map.png') }}" alt="">
            </div>
        </div>
        <h6>Copyright © 2010-2015 正点国际传媒 京ICP备17065992号-1</h6>
    </div>
</footer>
</div>
<script>

    function scrollToElment(el) {
        const { y } = el.getBoundingClientRect()
        window.scrollTo(0, y)
    }

    const selectById = id => document.querySelector(`#${id}`)
    document.getElementById('nav').addEventListener('click', (ev) => {
        const className = ev.target.className
        const dic = {
            'nav-about': 'about',
            'nav-res': 'resource',
            'nav-compagin': 'compagin',
            'nav-clients': 'clients',
            'nav-contact': 'contact'
        }
        if (dic[className]) {
            const el = selectById(dic[className])
            scrollToElment(el)
        } else {
            console.log(`not found el in dict : #${className}`)
        }
    })

    var clients1 = document.querySelector('#clients1')
    var clients2 = document.querySelector('#clients2')
    clients2.addEventListener('scroll', e => {
        clients1.scrollLeft = e.target.scrollLeft
    })

    const onwheel = e => {
        e.preventDefault()
        var eo = e.originalEvent, delta = eo['wheelDelta'] || -eo['detail'];
        console.log(e.wheelDelta)
        clients2.scrollLeft = clients1.scrollLeft = clients2.scrollLeft += (delta < 0 ? 1 : -1) * 80;
    }
    $(clients2).bind('mousewheel DOMMouseScroll',onwheel)
    $(clients1).bind('mousewheel DOMMouseScroll',onwheel)

</script>

</body>

</html>
