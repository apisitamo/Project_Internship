<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php include 'include/head.php';


if($langId == 1){
    $about = "เกี่ยวกับเรา";
    $about1 = "“สถาบันวิชาชีพสปา กรุงเทพ”";
    $about2 = "ก่อตั้งขึ้นเมื่อเดือนมิถุนายน 2550 โดยบริษัท ออเร็นทัล สปา จำกัด ";
    $about3 = "(ปัจจุบันคือ บริษัทบียอนด์ ดิจิทัล จำกัด)";
    $about4 = "ซึ่งได้เล็งเห็นว่าจำนวนบุคลากรผู้ให้บริการทางด้านสปา ที่มีอยู่นั้นไม่เพียงพอกับความต้องการของตลาดทั้งใน และต่างประเทศ ควรที่จะมีสถาบันเฉพาะ ที่ฝึกสอน อบรมทั้งด้านทฤษฎี และปฏิบัติ
                เพื่อผลิตบุคลากรทางด้านสปา ที่มีทั้งความรู้ความสามารถ และจริยธรรม ให้เป็นมาตรฐานที่ทั่วโลกยอมรับ ภายใต้ปรัชญา";
    $about5 = "“ภูมิปัญญาไทย มาตรฐานสากล”";
    $about6 = "จากประสบการณ์ในธุรกิจสปา อันยาวนานของผู้บริหาร “สถาบันวิชาชีพสปา กรุงเทพ” จึงเป็นหลักประกันได้อย่างดีว่า คุณภาพของหลักสูตร และวิธีการเรียนการสอนนั้น จะถูกถ่ายทอดสู่ผู้เรียนอย่างมีประสิทธิภาพ โดยเน้นการนำไปประกอบวิชาชีพได้จริง ทั้งนี้ 
               นักเรียนทุกคนจะได้รับประกาศนียบัตรทั้งภาษาไทย และภาษาอังกฤษ และมีโอกาสที่จะได้รับการบรรจุเข้าทำงานในสปา ทั้งในและต่างประเทศอีกด้วย";
    $about7 = "ที่ปรึกษา และบริหารกิจการสปา (Spa Consultant and Management)";
    $about8 = "ได้รับเป็นที่ปรึกษาให้แก่ผู้ที่ลงทุนธุรกิจสปาหลายแห่ง ทั้งในและต่างประเทศ อาทิ";
    $about9 = "Mandala Spa - เยอรมนี (ปี 2547) ,Orient Spa - ยูเครน (ปี 2548) PacificRegency Suite Hotel - มาเลเซีย (ปี 2549) ,
               Adriatic Palace Hotel - พัทยา (ปี 2550), Sawadee Reflexology Massage - อินเดีย (ปี 2551), Siam Health & Spa – กรุงเทพ (ปี 2551),
               เรือนดาหลา สปา - กรุงเทพ (ปี 2551), Wellness Medical Spa - พระนครศรีอยุธยา (ปี 2552) , จัสมิน สปา - ปทุมธานี (ปี 2555) ,
               Mizu Nail & Spa – กรุงเทพ (ปี 2555), ต้นข้าว นวดไทย & สปา - สระบุรี (ปี 2555) , La Lunar Spa – สมุย (ปี 2557),
               The Crystal Wellness & Spa – กรุงเทพ (ปี 2556), Mayya Spa - นนทบุรี (ปี 2558), Ozone Spa - กรุงเทพ (ปี 2558) เป็นต้น";
    $about10 = "ฝึกอบรมพนักงานสปา (Spa & Massage Therapist Training)";
    $about11 = "สถาบันวิชาชีพสปา กรุงเทพ ได้ร่วมกับ มหาวิทยาลัยธรรมศาสตร์ ในการจัดฝึกอบรมเชิงปฏิบัติการ";
    $about12 = "“โครงการต้นกล้าอาชีพ”";
    $about13 = "ในหลักสูตรสปาเพื่อสุขภาพ และความงามจำนวน 5 รุ่น ในปี 2552 มีผู้สำเร็จการฝึกอบรมทั้งสิ้น 500 คน";
    $about14 = "ฝึกอบรมพนักงานสปาไปทำงาน ณ Heathland Spa – ประเทศมาเลเซีย (ปี 2557 – 2560)";
    $about15 = "ฝึกอบรมพนักงานสปาไปทำงาน ณ Asia El Hana Spa - ประเทศแอลจีเรีย (ปี 2560 – 2561)";
    $about16 = "เดินทางไปฝึกอบรมพนักงานสปา ณ Thai Lanna Spa – สาธารณรัฐประชาชนจีน (ปี 2562)";
    $about17 = "ผู้บริหาร";
    $about18 = "ดร.ปรีชา บุญคมรัตน์";
    $about19 = "(ผู้อำนวยการสถาบัน)";
    $about20 = "ปริญญาเอก ด้านบริหารการศึกษา";
    $about21 = "อดีตผู้บริหารโรงเรียนมัธยมศึกษาดีเด่น แห่งประเทศไทย 3 ปีซ้อน";
    $about22 = "อดีตหัวหน้า “โครงการต้นกล้าอาชีพ” จัดอบรมหลักสูตรสปาเพื่อสุขภาพ และความงาม จำนวน 5 รุ่น";
    $about23 = "อดีตหัวหน้าโครงการศึกษาแนวทาง มาตรการ และข้อเสนอแนะทางกฎหมายเพื่อใช้กำกับธุรกิจสถานประกอบการเพื่อสุขภาพในประเทศไทย";
    $about24 = "อดีตหัวหน้าโครงการสปาไทยสู่สากล (การพัฒนาธุรกิจสปา สู่เกณฑ์คุณภาพธุรกิจ)";
    $about25 = "นาเดีย บุญคมรัตน์";
    $about26 = "(รองผู้อำนวยการสถาบัน)";
    $about27 = "ปริญญาตรี สถาปัตยกรรมศาสตร์ สาขาสถาปัตยกรรมภายใน (สน.บ.) มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี";
    $about28 = "ใบรับรองผู้ดำเนินการสปาเพื่อสุขภาพ กระทรวงสาธารณสุข";
    $about29 = "ประกาศนียบัตรนวดด้วยน้ำมันหอมระเหย สมาคมแพทย์แผนไทย
                ประกาศนียบัตรดูแลสตรีหลังคลอด สมาคมแพทย์แผนไทย";
    $about30 = "อดีตกรรมการทดสอบมาตราฐานฝีมือแรงงานแห่งชาติ สาขานักส่งเสริมสุขภาพองค์รวมสปาตะวันตก ระดับ 1";
    $about31 = "อดีตวิทยากรฝึกอบรมผู้สนใจประกอบธุรกิจสปา สำนักงานส่งเสริมวิสาหกิจขนาดกลางและขนาดย่อม (สสว.)";
    $about32 = "อดีตโค้ชและที่ปรึกษาในโครงการสปาไทยสู่สากล (การพัฒนาธุรกิจสปาสู่เกณฑ์คุณภาพธุรกิจ)";
    $about33 = "อดีตผู้จัดการ “ดิ ออเร็นทิสต์ สปา” ผู้เชี่ยวชาญด้านที่ปรึกษาสปา ประสบการณ์ 15 ปี";
    $about34 = "ผู้สอน";
    $about35 = "ปณิชา บัวเขียว";
    $about36 = "(ครูเก๋)";
    $about37 = "การทำงาน";
    $about38 = "ประสบการณ์สอน 13 ปี";
    $about39 = "หลักสูตรนวดไทย 150 ชั่วโมง จากสมาคมแพทย์แผนไทย";
    $about40 = "หลักสูตรนวดฝ่าเท้า 60 ชั่วโมง จากสมาคมแพทย์แผนไทย";
    $about41 = "หลักสูตรนวดน้ำมันหอมระเหย 60 ชั่วโมง จากสมาคมแพทย์แผนไทย";
    $about42 = "หลักสูตรนวดสวีดีสจากสถาบันวิชาชีพสปากรุงเทพ";
    $about43 = "หลักสูตรแก้นวดอาการ 372 ชั่วโมง จากสมาคมแพทย์แผนไทย";
    $about44 = "ผ่านการการทดสอบมาตรฐานผีมือแรงงานแห่งชาติเมื่อวันที่ 12 พฤษภาคม 2559";
    $about45 = "ผ่านการอบรมหลักสูตรวิทยากรและครูนวดไทยจากสมาคมแพทย์แผนไทย วันที่ 20 มิถุนายน 2557";
    $about46 = "ผ่านการเป็นวิทยากรโครงการต้นกล้าอาชีพเมื่อปี 2553";
    $about47 = "ผ่านการอบรมหลักสูตรไทยสัปยะจากกรมพัฒนาผีมือแรงงานจังหวัดพิจิตร วันที่ 25 พฤษภาคม 2549";
    $about48 = "ฐานิดา ทิพย์สมบัติ";
    $about49 = "(ครูตาล)";
    $about50 = "การทำงาน";
    $about51 = "หลักสูตรนวดไทย 150 ชั่วโมง จากสมาคมแพทย์แผนไทย";
    $about52 = "หลักสูตรนวดเท้า 60 ชั่วโมง จากสมาคมแพทย์แผนไทย";
    $about53 = "หลักสูตรดูแลผิวหน้า 60 ชั่วโมง จากสมาคมแพทย์แผนไทย";
    $about54 = "หลักสูตรนวดน้ำมันหอมระเหย 60 ชั่วโมง จากสมาคมแพทย์แผนไทย";
    $about55 = "หลักสูตรวิทยากรและครูนวดไทย จากสมาคมแพทย์แผนไทย";
    $about56 = "หลักสูตรผู้ดำเนินการสปา มหาวิทยาลัยเชียงใหม่";
    $about57 = "ใบรับรองผู้ดำเนินการสปา กระทรวงสาธารณะสุข";
    $about58 = "อดีต Trainer “THE KLINIQUE (เดอะคลีนิกค์) ”";
    $about59 = "อดีตผู้จัดการ “MAJIA Acupuncture Clinic มาเจียฝังเข็มบางนา”";
}else{
    $about = "About";
    $about1 = "Bangkok Spa Academy";
    $about2 = "was founded in June 2007 by Oriental Spa CO., LTD.";
    $about3 = "(currently Beyond Digital Co., Ltd.)";
    $about4 = "We see that the number
               of spa service personnel available is insufficient to meet the needs of both domestic and international markets. There
               should be specialized institutions that teach and train both theoretically and practically to produce spa personnel
               with both knowledge, abilities and ethics to be accepted by the world under the philosophy of ";
    $about5 = "“Thai Wisdom, World Standard”";
    $about6 = "Based on its long experience in the spa business of management, “Bangkok Spa Academy” ensures that the quality of
               the curriculum and the teaching and learning methods are effectively transmitted to the learners. It focuses on practical
               professional practice. All students will receive diplomas in both Thai and English and have the opportunity to be admitted
               to spas both domestically and internationally.";
    $about7 = "Spa Consultant and Management";
    $about8 = "Oriental Spa CO., LTD. (currently Beyond Digital Co., Ltd.) has been a consultant to many spa businesses both domestic and international,such as:";
    $about9 = "Mandala Spa - Germany (2004), Orient Spa - Ukraine (2005), Pacific Regency Suite Hotel - Malaysia (2006),
               Adriatic Palace Hotel - Pattaya (2007), Sawadee Reflexology Massage - India (2008), Siam Health & Spa - Bangkok (2008),
               Ruandala Spa - Bangkok (2008), Wellness Medical Spa - Phra Nakhon Si Ayutthaya (2009), Jasmine Spa - Pathum Thani (2012),
               Mizu Nail & Spa - Bangkok (2012), Rice Tree Thai Massage & Spa - Saraburi (2012), La Lunar Spa - Samui (2014), The Crystal Wellness & Spa - Bangkok (2013),
               Mayya Spa - Nonthaburi (2015), Ozone Spa - Bangkok (2015), etc.";
    $about10 = "Spa & Massage Therapist Training";
    $about11 = "Bangkok Spa Academy has partnered with Thammasat University to organize a workshop on the ";
    $about12 = "“Ton- Kla Achip Project”.";
    $about13 = "In 2009, a total of 500 Participants completed their training.";
    $about14 = "Training spa therapists to work at Heathland Spa – Malaysia (2014 – 2017)";
    $about15 = "Training spa therapists to work at Asia El Hana Spa - Algeria (2017 – 2018)";
    $about16 = "Training spa therapists to work at Thai Lanna Spa – People's Republic of China (2019)";
    $about17 = "Administrator";
    $about18 = "Dr. Preecha Bunkomrat";
    $about19 = "(Director of the Institute)";
    $about20 = "Ph.D. in Educational Administration";
    $about21 = "Former Outstanding Secondary School Administrator in Thailand for 3 consecutive years";
    $about22 = "The former head of the “ Ton- Kla Achip Project ” Organized 5 models of spa and beauty spa training.";
    $about23 = "The former head of the project studied guidelines, measures and recommendations. Legal to regulate the business of health establishments in Thailand";
    $about24 = "Former Head of Thai Spa International Project (Spa Business Development towards Quality Criteria business).";
    $about25 = "Nadia Bunkomrat";
    $about26 = "(Deputy Director of the Institute)";
    $about27 = "Bachelor of Architecture Program in Interior Architecture (B.Arch.)
                King Mongkut's University of Technology Thonburi";
    $about28 = "Health Establishment License for Practitioner (SPA), Ministry of Public Health";
    $about29 = "Certificate of Aromatherapy Massage Course (60 hours) , Thai Traditional Medical Services Society
                Certificate of Postpartum Care Course (30 hours), Thai Traditional Medical Services Society";
    $about30 = "Former Member of the National Skill Workers' Standard, Western Spa Holistic Health Promotion Branch, Level 1.";
    $about31 = "Former spa trainer, The Office of Small and Medium Enterprises Promotion (OSMEP)";
    $about32 = "Former coach and consultant in Thai Spa International Project (Spa Business Development to business quality criteria).";
    $about33 = "Former manager of “ The Orientist Spa” Expert Spa Consultants 15 years of experience.";
    $about34 = "Teacher";
    $about35 = "Panicha Buakhiao";
    $about36 = "(Kae)";
    $about37 = "การทำงาน";
    $about38 = "13 years teaching experience";
    $about39 = "- Thai Massage Course (150 hours) from Thai Traditional Medical Services Society";
    $about40 = "- Foot massage course (60 hours) from Thai Traditional Medical Services Society";
    $about41 = "- Aromatherapy Massage Course (60 hours) from Thai Traditional Medical Services Society";
    $about42 = "- Swedish Massage Course (60 hours) from Bangkok Spa Academy";
    $about43 = "- 372 hours massage course from Thai Traditional Medical Services Society";
    $about44 = "- The national skill standard test on May 12, 2016.";
    $about45 = "- Trained Thai massage instructors and teachers from the Thai Traditional Medicine Association 20 June 2014.";
    $about46 = "- Trainer of program Ton- Kla Achip Project in 2010.";
    $about47 = "- Thai Sapaya course training from the Phichit Department of Skill Development organized on May 25, 2006.";
    $about48 = "Thanida ThipSombat ";
    $about49 = "(Tan)";
    $about50 = "การทำงาน";
    $about51 = "Thai Massage Course (150 hours) from Thai Traditional Medical Services Society";
    $about52 = "Foot massage course (60 hours) from Thai Traditional Medical Services Society";
    $about53 = "Aromatherapy Massage Course (60 hours) from Thai Traditional Medical Services Society";
    $about54 = "Facial Massage Course (60 hours) from Thai Traditional Medical Services Society";
    $about55 = "Thai Massage Instructor from Thai Traditional Medical Services Society";
    $about56 = "Spa Operator Course from Chiang Mai University";
    $about57 = "Health Establishment License for Practitioner (SPA), Ministry of Public Health";
    $about58 = "Former Trainer “THE KLINIQUE ”";
    $about59 = "Former Manager of “ MAJIA Acupuncture Clinic” ";
}
?>

<body>
    <section class="banner-page"data-aos="flip-down" data-aos-duration="2000">
        <div class="wrap">
            <img src="assets/images/banner-page.png" alt="">
            <p><?= $about ?></p>
        </div>
    </section>

    <section class="about-us">
        <div class="container ">
            <div class="spa">
                <div class="row">
                    <div class="col-lg-6"data-aos="zoom-out-right" data-aos-duration="2000">
                        <span class="text-second"><?= $about1 ?></span> <span class="text2"><?= $about2 ?> <span class=text-main><?= $about3 ?></span> <?= $about4 ?> <span class=text-main><?= $about5 ?> </span>
                        <?= $about6 ?></span>

                    </div>
                    <div class="col-lg-6"data-aos="zoom-out-left" data-aos-duration="2000">
                        <img src="assets/images/pic6.png" alt="" class="w-100">
                    </div>
                </div>
            </div>
            <div class="spa consultant">
                <div class="row">
                    <div class="col-lg-6"data-aos="zoom-out-right" data-aos-duration="2000">
                        <img src="assets/images/pic7.png" alt="" class="w-100">
                    </div>
                    <div class="col-lg-6"data-aos="zoom-out-left" data-aos-duration="2000">
                        <p class="head-since1"> <?= $about7 ?></p>
                        <span class="text-main"><?= $about8 ?></span><br>
                        <span class="text2"><?= $about9 ?></span>
                    </div>
                </div>
            </div>
            <div class="spa">
                <div class="row">
                    <div class="col-lg-6"data-aos="zoom-out-right" data-aos-duration="2000">
                        <p class="head-since"><?= $about10 ?></p>
                        <div class="text2">
                            <li><?= $about11 ?><span class=text-main><?= $about12 ?></span><?= $about13 ?></li>
                            <li><?= $about14 ?></li>
                            <li><?= $about15 ?></li>
                            <li><?= $about16 ?></li>
                        </div>
                    </div>
                    <div class="col-lg-6"data-aos="zoom-out-left" data-aos-duration="2000">
                        <img src="assets/images/pic8.png" alt="" class="w-100">
                    </div>
                </div>
            </div>

            <!--detail
            <div class="spadetail">
                <p class="title">ที่ปรึกษา และบริหารกิจการสปา (Spa Consultant and Management )</p>
                <span>ได้รับเป็นที่ปรึกษาให้แก่ผู้ที่ลงทุนธุรกิจสปาหลายแห่ง ทั้งในและต่างประเทศ อาทิ
                    Mandala Spa - เยอรมนี (ปี 2547) ,Orient Spa - ยูเครน (ปี 2548) PacificRegency Suite Hotel - มาเลเซีย (ปี 2549) ,
                    Adriatic Palace Hotel - พัทยา (ปี 2550), Sawadee Reflexology Massage - อินเดีย (ปี 2551), Siam Health & Spa – กรุงเทพ (ปี 2551),
                    เรือนดาหลา สปา - กรุงเทพ (ปี 2551), Wellness Medical Spa - พระนครศรีอยุธยา (ปี 2552) , จัสมิน สปา - ปทุมธานี (ปี 2555) ,
                    Mizu Nail & Spa – กรุงเทพ (ปี 2555), ต้นข้าว นวดไทย & สปา - สระบุรี (ปี 2555) , La Lunar Spa – สมุย (ปี 2557),
                    The Crystal Wellness & Spa – กรุงเทพ (ปี 2556), Mayya Spa - นนทบุรี (ปี 2558), Ozone Spa - กรุงเทพ (ปี 2558) เป็นต้น</span>

                <p class="title">ฝึกอบรมพนักงานสปา (Spa & Massage Therapist Training)</p>
                <ul class="list">
                    <li>สถาบันวิชาชีพสปา กรุงเทพ ได้ร่วมกับ มหาวิทยาลัยธรรมศาสตร์ ในการจัดฝึกอบรมเชิงปฏิบัติการ
                        “โครงการต้นกล้าอาชีพ” ในหลักสูตรสปาเพื่อสุขภาพ และความงามจำนวน 5 รุ่น ในปี 2552
                        มีผู้สำเร็จการฝึกอบรมทั้งสิ้น 500 คน</li>
                    <li>ฝึกอบรมพนักงานสปาไปทำงาน ณ Heathland Spa – ประเทศมาเลเซีย (ปี 2557 – 2560)</li>
                    <li>ฝึกอบรมพนักงานสปาไปทำงาน ณ Asia El Hana Spa - ประเทศแอลจีเรีย (ปี 2560 – 2561)</li>
                    <li>เดินทางไปฝึกอบรมพนักงานสปา ณ Thai Lanna Spa – สาธารณรัฐประชาชนจีน (ปี 2562)</li>
                </ul>
            </div>
            -->
            <div class="title-sec"data-aos="fade-down" data-aos-duration="2000">
                <div class=text-line-vertical>
                    <h2><span><?= $about17 ?></span></h2>
                </div>
            </div>
            <div class="lacturer">
                <div class="row">
                    <div class="col-lg-3"data-aos="fade-right" data-aos-duration="2000">
                        <img src="assets/images/member1.png" alt="" class="w-100">
                    </div>
                    <div class="col-lg-9"data-aos="fade-left" data-aos-duration="2000">
                        <div class="name">
                            <img src="assets/images/spa.png" alt="">
                            <span class="head1"><?= $about18 ?> <span class="custom"><?= $about19 ?></span> </span>
                        </div>
                        <div class="timeline">
                            <img src="assets/images/icon.png" alt="">
                            <span><?= $about20 ?></span>
                        </div>
                        <ul class="timeline">
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about21 ?></p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about22 ?></p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about23 ?></p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about24 ?></p>
                                </div>
                            </li>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9"data-aos="fade-right" data-aos-duration="2000">
                        <div class="name">
                            <img src="assets/images/icon1.png" alt="">
                            <span class="head1"><?= $about25 ?> <span class="custom"><?= $about26 ?></span> </span>
                        </div>
                        <div class="timeline">
                            <img src="assets/images/icon.png" alt="">
                            <span><?= $about27 ?></span>
                        </div>
                        <ul class="timeline">
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about28 ?></p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about29 ?></p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about30 ?></p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about31 ?></p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about32 ?></p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about33 ?></p>
                                </div>
                            </li>
                    </div>
                    <div class="col-lg-3"data-aos="fade-left" data-aos-duration="2000">
                        <img src="assets/images/member-2.png" alt="" class="w-100">
                    </div>
                </div>
                <div class="title-sec"data-aos="fade-down" data-aos-duration="2000">
                    <div class=text-line-vertical>
                        <h2><span> <?= $about34 ?> </span></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3"data-aos="fade-right" data-aos-duration="2000">
                        <img src="assets/images/member2.png" alt="" class="w-100 imgmobile">
                    </div>
                    <div class="col-lg-9"data-aos="fade-left" data-aos-duration="2000">
                        <div class="name">
                            <img src="assets/images/icon2.png" alt="">
                            <span class="head1"><?= $about35 ?><span class="custom"> <?= $about36 ?></span> </span>
                        </div>
                        <p class="head2"> <?= $about37 ?> </p>
                        <ul class="timeline timeline-custom1">
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about38 ?></p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p> <?= $about39 ?> </p>
                                    <p> <?= $about40 ?> </p>
                                    <p> <?= $about41 ?> </p>
                                    <p> <?= $about42 ?> </p>
                                    <p> <?= $about43 ?> </p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about44 ?></p>
                                    <p><?= $about45 ?></p>
                                    <p><?= $about46 ?></p>
                                    <p><?= $about47 ?></p>
                                </div>
                            </li>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9"data-aos="fade-right" data-aos-duration="2000">
                        <div class="name">
                            <img src="assets/images/icon2.png" alt="">
                            <span class="head1"><?= $about48 ?><span class="custom"> <?= $about49 ?></span> </span>
                        </div>
                        <p class="head2"><?= $about50 ?></p>
                        <ul class="timeline timeline-custom2">
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about51 ?></p>
                                    <p><?= $about52 ?></p>
                                    <p><?= $about53 ?></p>
                                    <p><?= $about54 ?></p>
                                    <p><?= $about55 ?></p>
                                    <p><?= $about56 ?></p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about57 ?></p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about58 ?></p>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <p><?= $about59 ?></p>
                                </div>
                            </li>
                    </div>
                    <div class="col-lg-3"data-aos="fade-left" data-aos-duration="2000">
                        <img src="assets/images/member-4.png" alt="" class="w-100">
                    </div>
                </div>
            </div>
    </section>

    <?php include 'include/footer.php';?>
</body>
<script>
  AOS.init();
</script>
</html>