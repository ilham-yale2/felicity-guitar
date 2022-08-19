
<?php $__env->startSection('meta'); ?> <?php echo $__env->make('layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'About us'); ?>

<?php $__env->startSection('css'); ?>
    <style>
        #wrap{
            padding-top: 115px;

        }

        h2{
            font-size: 1.75rem!important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <a href="#wrap" class="btn-top">
        <span class="iconify" data-icon="akar-icons:arrow-up"></span>
    </a>
    <div class="position-fixed nav-about h-100 ">
        <button type="button" class="btn d-flex align-items-center text-white bg-orange" id="button-about">
            <span class="iconify" data-width="35" data-icon="bi:caret-right-fill"></span>
        </button>
        <div class="w-100">
            <ul class="nav-list">
                <li>
                    <a href="#service">Luthier Service</a>
                </li>
                <li>
                    <a href="#shop_policies">Shop Policies</a>	
                </li>
                <li>
                    <a href="#sales">Sales</a>
                </li>
                <li>
                    <a href="#shipping">Shipping</a>
                </li>
                <li>
                    <a href="#other"> Miscellaneous</a>	
                </li>
            </ul>
        </div>
    </div>  
    <div class="aboutus" id="wrap">
        <div class="container">
            

            
            <section class="welcome_message ">
                <img src="<?php echo e(asset('images/Welcome-Banner.png')); ?>" class="text-center" alt="">
                <h3 class="text-center mt-3 copperplate">
                    OUR SITE IS STILL UNDER CONSTRUCTION, BUT PLEASE C’MON IN, HAVE A LOOK AROUND 
                </h3>
                <div class="row mt-3 mx-0">
                    <div class="col-md-3 px-md-0 mx-auto mx-md-0">
                        <img src="<?php echo e(asset('images/Team Felicity.jpg')); ?>" class="shadow-md" alt="">
                        <h3 class="text-gold copperplate mt-3 text-center">~ TEAM FELICITY ~</h3>
                    </div>
                    <div class="col-md-9 pl-md-5">
                        <p class="text-white text-justify mb-4">

                            Felicity’s Guitars has been in business since 2002 when my Dad, an apprentice luthier at the time, first opened a small guitar repair shop in our garage. Over the years our family’s interest in fine and rare guitars has never waned an inch, and now 20 years later, we’re blessed to be able to offer our select portfolio of electric and acoustic guitars for your consideration as well as large number of accoutrements and even some very exotic Indonesian instruments. 
                        </p>
                        <p class="text-justify mb-4">
                            Whether you’re a working musician on a budget or a serious collector, we’ll try our best to help you find the perfect guitar 	for you right here. And if we don’t have exactly what you’re 	looking for in stock − we are always happy to help you find it 	from a number of other great shops that we’re very pleased to 	call friends −and can wholeheartedly recommend. 
                        </p>
                        <p class="text-justify mb-4">
                            Like my Dad says; <i>“It’s not about the ‘bread’, it’s about the music, the journey −and good vibrations”</i>.   
                        </p>
                        <p class="text-justify mb-4">
                            If you have any questions about the guitars or gear you see on our website; please don’t hesitate to call or email us. 
                        </p>
                        <p class="text-justify mb-4">
                            As well as selling, we also buy and trade fine guitars. For a full list of our “wish list” guitars, check out our Sell or Trade page.
                        </p>
                        <p>
                            If you’ve got some spare time, do check out our ‘Private Vault’ –sorry not for sale– but we like sharing the pictures with fellow guitar enthusiasts anyway. Also check out our ‘links’ section − you may find some cool things right in your own area and save on shipping cost
        
                        </p>
                        <p>
                            Thanks for checking us out! 
                        </p>
                        <img src="<?php echo e(asset('images/felicity-signature.png')); ?>" width="150" alt="felicity-signature">
                    </div>
                </div>
                
            </section>

            

            <section class="luthier_service" id="service">
                <h2 class="text-gold">LUTHIER SERVICE</h2>
                <p> <b>We work on all plucked instruments and stringed instruments </b></p>
                <p>
                    The instrument must be delivered with strings mounted and under normal (standard tuning) tension, so that an immediate evaluation of any intervention work can be made on			the spot. Please tune your instrument to tension at least 24-hrs before presenting for evaluation. Our service estimate will be made post-evaluation at the time of delivery of the 		instrument, and we will issue a detailed worksheet along with the collection date. 
                </p>
                <p>
                    We can, under special circumstances, carry out a remote evaluation for intervention via email with adequate photographs and/or video supplied by the Client. For more 				information see our price list below. To make an appointment, please use the contact us app.

                </p>
                <div class="my-md-5 my-3 text-center">
                    <p>− LABOR ESTIMATES FOR SETUP AND REPAIR WORK FOR 2022 (NOT INCLUDING PARTS) −</p>
                </div>
                <h3 class="text-gold text-underline">ACOUSTIC GUITAR WORK</h3>
                <p>Free Evaluation... no charge. We’re even happy to offer you a nice cup of coffee, on us, while you wait.</p>
                    
                <p> We’ll give your guitar a thorough inspection inside and out, letting you know what is correct and what may need attention now or in the near future. Frets, neck, action, bridge 			and bridge plate, truss rod, tuners, and internal bracing are some of the things that are assessed. This service is provided as a courtesy to our customers and there is no obligation 		or pressure to buy anything </p>
                <h4 class="text-gold font-weight-bold">Acoustic Guitar Setups</h4>
                <p>
                    Most acoustic guitars will benefit from an annual setup, and instruments that are kept in less than ideal climate conditions (or that are on the road a lot) may need two per year. 			We’ll evaluate your guitar and make a recommendation. Setups may include truss rod nut lubrication and adjustment, saddle lowering to adjust action, nut slot adjustments, 			cleaning of grimy frets and fretboard, adjusting tuners, installing new strings, and checking electronics and batteries. Price is based on what your guitar needs. The price range is 			for labor and does not include parts costs such as strings and bone nut and saddle blanks.
                </p>
                <p>
                    NOTE: On some guitars, fret work may be needed in order to reduce or eliminate buzzing. Fret work is not included in a setup; see prices for fret work below.
                </p>
                <table class="table text-white border-0" width="100%">
                    <tr>
                        <td class="border-0 px-0 pb-3 font-weight-bold" width="30%">
                            Acoustic Guitar Setup  	
                        </td>
                        <td class="border-0 px-0 pb-0">
                            25.00−45.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            New Bone Nut, 6 string 
                        </td>
                        <td class="border-0 px-0 pb-0">
                            40.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            New Bone Nut, 12 string 
                        </td>
                        <td class="border-0 px-0 pb-0">
                            75.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            New Bone Saddle, basic   
                        </td>
                        <td class="border-0 px-0 pb-0">
                            30.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            New Bone Saddle, compensated 
                        </td>
                        <td class="border-0 px-0 pb-0">
                            35.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            New Bone Saddle, Vintage Martin Style  
                        </td>
                        <td class="border-0 px-0 pb-0">
                            50.00
                        </td>
                    </tr>
                </table>
                <h4 class="text-gold ">Acoustic Repair Work</h4>
                <table class="table text-white border-0" width="100%">
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Bridge Re-glue, basic   	
                        </td>
                        <td class="border-0 px-0 pb-0">
                            75.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            New Bridge, Martin style 
                        </td>
                        <td class="border-0 px-0 pb-0">
                            110.00 (Includes making, slotting, and installing)
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Bridge Plate Repair  
                        </td>
                        <td class="border-0 px-0 pb-0">
                            45.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Re-glue Loose Brace    
                        </td>
                        <td class="border-0 px-0 pb-0">
                            35.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Repair Top or Back Crack  
                        </td>
                        <td class="border-0 px-0 pb-0">
                            45.00+ (does not include any finish work)
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Repair side crack 	  
                        </td>
                        <td class="border-0 px-0 pb-0">
                            75.00+ (does not include any finish work)
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Broken Peghead Repair 	  
                        </td>
                        <td class="border-0 px-0 pb-0">
                            200.00 and up… USA made brands
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Neck Re-set  	  
                        </td>
                        <td class="border-0 px-0 pb-0">
                            200.00 and up… USA made brands
                        </td>
                    </tr>
                </table>
                <h3 class="text-gold text-underline mt-4 mt-md-5">
                    ELECTRIC GUITAR AND BASS WORK
                </h3>
                <p>
                    Setting up electric guitars and bass guitars can include truss rod lubrication and adjustment, bridge height and radius adjustment, setting intonation, adjusting tuners, and 			adjusting the nut slots for correct action at the first fret. Restringing and cleaning and polishing of the fretboard and frets is also included.
                </p>
                <p>
            		NOTE: Due to the nature of electric guitar construction, it is extremely common for these instruments to need fret work to play well. 80% or more of electrics, especially those 			with bolt-on necks, have high frets in the tongue area that must be addressed in order to play without excess buzzing. This includes most new electric guitars right off the shelf. 			Please see the fret work section below for fret work pricing.
                </p>
                <table class="table text-white border-0" width="100%">
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Electric Guitar Setup, hardtail models     	
                        </td>
                        <td class="border-0 px-0 pb-0">
                            45.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            electric Guitar Setup, Strat style floating tremolo   
                        </td>
                        <td class="border-0 px-0 pb-0">
                            60.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Electric Guitar Setup, Floyd Rose style floating tremolo    
                        </td>
                        <td class="border-0 px-0 pb-0">
                            90.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Volume and Tone Pot, and Switch Cleaning     
                        </td>
                        <td class="border-0 px-0 pb-0">
                            5.00 / per potentiometer
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Replacing pots, pickups, etc.   
                        </td>
                        <td class="border-0 px-0 pb-0">
                            40.00 / hour
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Bass Guitar Setup, basic  	  
                        </td>
                        <td class="border-0 px-0 pb-0">
                            45.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            New Bone Nut, 6 string  	  
                        </td>
                        <td class="border-0 px-0 pb-0">
                            60.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            New Bone Nut, 12 string  	  
                        </td>
                        <td class="border-0 px-0 pb-0">
                            100.00
                        </td>
                    </tr>
                </table>
                <h4 class="text-gold font-weight-bold mt-4 mt-md-5">Fret Work for Acoustics and Electrics</h4>
                <p>
                    Many guitars (even new guitars) need the frets leveled in order to play cleanly with low action. Most electric guitars with bolt-on necks come from the factory with high tongue frets. Doing great fret work is a learned art, and we guarantee that you will be happy with ours. All our fret work jobs are performed with the guitar mounted in a neck jig that 	simulates string tension. This ensures very accurate work. 
                </p>
                <p>
                    Re-fret jobs include leveling the fretboard if needed.
                </p>
                <table class="table text-white border-0 mt-3" width="100%">
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Fret Dressing      	
                        </td>
                        <td class="border-0 px-0 pb-0">
                            75.00
                        </td>
                    </tr>
                </table>
                <p>
                    A fret dress includes leveling all the frets, re-crowning, and polishing of the frets and fretboard. Often this service is needed even on new guitars in order to set them up to play 			their best.
                </p>
                <table class="table text-white border-0" width="100%">
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Complete Re-fret       	
                        </td>
                        <td class="border-0 px-0 pb-0">
                            200.00 (Includes leveling of the fretboard)
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Complete Re-fret plus refinishing Maple fretboard       	
                        </td>
                        <td class="border-0 px-0 pb-0">
                            300.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Partial Re-fret (requires a fret dress)        	
                        </td>
                        <td class="border-0 px-0 pb-0">
                            10.00 (per fret plus 75.00 for fret dress)
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Loose Fret Ends, per fret      	
                        </td>
                        <td class="border-0 px-0 pb-0">
                            5.00
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            High Fret leveling, per fret      	
                        </td>
                        <td class="border-0 px-0 pb-0">
                            10.00 (if more than a couple of frets are high, a complete leveling is recommended)
                        </td>
                    </tr>
                </table>
                <p>We offer many fretwire types and profiles; from small to large, low to high, narrow to wide, and oval to round. Premature wear can be avoided with quality fret wire, and we 			highly recommend using Jescar stainless frets available at a modest premium.</p>
                <p>Learn more about Jescar frets at their official website via “Our Recommendations” section link.</p>
                <h3 class="text-gold text-underline mt-5">
                    CLEANING & POLISHING ACOUSTICS AND ELECTRICS
                </h3>
                <table class="table text-white border-0" width="100%">
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Standard thorough body/neck cleaning & polishing 
                        </td>
                        <td class="border-0 px-0 pb-0">
                            50.00
                        </td>
                    </tr>
                </table>
                <p class="mb-0">This includes the instrument’s body, neck and front & back of peghead. We use three-step non-silicone based polishing compounds to achieve best results. This does not include 			fretboard treatment and/or fret polishing which requires the removal –and sometimes replacement- of the strings.</p>
                <table class="table text-white border-0" width="100%">
                    <tr>
                        <td class="border-0 px-0 pb-0" width="30%">
                            Complete cleaning & polishing  
                        </td>
                        <td class="border-0 px-0 pb-0">
                            70.00
                        </td>
                    </tr>
                </table>
                <p>This includes the above standard scope of work + fretboard treatment and/or fret polishing. This does not include fret leveling, crowning, etc.</p>

                <h3 class="text-gold mt-4">
                    Refinishing Acoustics and Electrics
                </h3>
                <p>
                    We can professionally refinish your instrument using a variety of the highest quality finish work materials, including nitrocellulose and polyurethane. The work required to refinish 		each guitar will vary based on its size, existing damage –if any– such as cracks, dents, previous repairs and/or excessive coating that will require sanding removal. 
                </p>
                <p>
                    As such; estimates for refinishing work can only be made after reviewing the instruments particulars. 

                </p>
                <p class="text-gold"><i>The owner of the instrument should also be aware and carefully consider that refinishing work – even the best quality refinish – will almost certainly reduce the re-sale value 		of your instrument. We do not refinish true vintage instruments beyond damage or crack repair for this reason.</i></p>
                <h4 class="text-gold">
                    Our Shop/Luthier Labor Policies
                </h4>
                <p>Shop Hourly Rate is $40.00 per hour. Since each guitar is unique, prices quoted are estimates and may be adjusted based on the actual time involved. A final price will be 				submitted prior to actual work and price quotation may need to be adjusted in the case of repairs that get more involved as the work progresses.  </p>
                <p>Express service and rush jobs may be charged extra pending current workload. Generally we can perform setups and fret dress jobs in 1-3 days. Other services may take longer. 			We always strive to meet the scheduling needs of our customers – whenever possible – and without cutting corners. </p>
                <p>We proudly stand by our work. </p>
                <p>
                    Please call or email us to discuss your guitar and to schedule a drop-off. We look forward to serving you!
                </p>
            </section>

            <section class="shop_policies mt-5 pt-3" id="shop_policies">
                <h2 class="text-gold mb-4">
                    SHOP POLICIES
                </h2>
                <h3 class="text-gold mt-3">GENERAL</h3>
                <p>
                    We can proudly say that we have never received a Customer request for the return of any item/instrument purchased from us; having a 100% Customer satisfaction record. Thanks to the Lord Almighty.
                </p>
                <p>
                    Having said that, please read and understand our policies regarding transactions, below:


                </p>
                <h3 class="text-gold mt-3">BUSINESS HOURS</h3>
                <p>We strive to respond to all email, app-message and telephone inquiries 
                    We are open Monday−Saturday, 07:00−23:00 (GMT +07:00) | Closed Sunday & Major Holidays
                </p>
                <p>
                    By appointment, all our instruments and gear can be seen in person at our shop Monday−Saturday, 10:00−19:00 (WIB) 
                </p>
                <p id="sales">
                    Please note that due to pandemic safety protocols we are not equipped to entertain “groups” of visitors and we request visitors by appointment limit numbers to 1-2 persons. Thank you for your kind understanding. 
                </p>
                <h2 class="text-gold mt-3">SALES</h2>
                <p>
                    Items sold are 'as-described' and 'as-illustrated' in photographs. Please contact us for any additional information you may require, or for more detailed photographs before purchasing if you have any uncertainties. 
                    
                </p>
                <p>
                    If in doubt; please ask. We are always glad to assist you and provide any clarification that you may require. By request; we can also provide video and/or photographic documentation of your order during pre-shipment final inspection and boxing. Then, if you are satisfied we will ship your order. 
                </p>
                <p>
                    All listed and/or negotiated final prices are already inclusive of local VAT (tax) liability.  
                </p>
                <p>
                    International Buyers – Please Note: Import duties, taxes, and charges are not included in the item price or shipping cost. These charges are the buyer's responsibility. Please check with your country's Customs office to determine what these additional costs will be prior to bidding or buying.
                </p>

                
                <p >
                    Items traded internationally – Felicity’s Guitars shall be responsible for import duties, taxes, and Customs clearance related charges on our receiving end and reciprocally, Customer shall be responsible for import duties, taxes, and Customs clearance related charges on Customer’s  respective end, unless otherwise negotiated and agreed to prior to executing the trade
                </p>

                <h3 class="text-gold mt-5 text uppercase" >PAYMENT</h3>
                <p>
                    Payment can be made by Wire Transfer or by PayPal in either US Dollar, Singapore Dollar or Indonesian Rupiah currencies. 
                </p>
                <h3 class="text-gold mt-5 text uppercase">Deposit / holding policies</h3>
                <p>
                    A 10% non-refundable deposit will hold any guitar for sixty (60) days from the time of receipt of the customer’s deposit. 
                </p>
                <p>
                    When an instrument is placed on hold for a customer, it is guaranteed to be reserved for the depositor (customer) exclusively and withdrawn from our sales inventory by cataloging the instrument as being “on hold”. The instrument will remain displayed on our website for viewing purposes only.  
                </p>
                <p>
                    No subsequent offer made by any other customer − regardless of the amount − will break a hold guarantee once it has been reserved by deposit.  
                </p>
                <p>
                    In return, we trust in good faith that a hold request is a sincere commitment to finalize the purchase within sixty (60) days. Instruments held by deposit, once paid for in full and shipped, are considered final and ineligible for return and/or refund. No exceptions.
                </p>
                <h3 class="mt-5 text-uppercase text-gold">returns</h3>
                <p>For International orders; all sales are considered final. This is due to local Customs' re-importation duties/taxes/fees and bureaucratic red-tape that we will unavoidably incur on our end. Sorry. Again, please correspond with us prior to purchasing if you have any questions or uncertainties.</p> 
                <p>For local orders; if upon receipt if you are dissatisfied with your purchase, you must notify us within 24 hours. Items cannot be returned unless it arrives in a condition other than how it was described or photographed. We strongly encourage the Customer to make a video recording of the actual unboxing process and item inspection, as we do, prior to shipping.  </p>
                <p>Customer is responsible for all shipping, insurance and bank charges incurred. Any guitar returned not in the same condition as sent or for a frivolous reason is subject to 10% or more restocking fee at our sole discretion. All returns must be fully insured. 
                    Returned items must be shipped-back by Customer within two (2) days after receiving, and in the original 'as-received' packaging materials. The Customer shall be responsible for any-and-all return shipping fees.
                </p>
                <p>
                    After we receive, inspect and confirm item is in the original condition that we shipped out; we will refund the original sales price -minus a $50 restocking fee- within two (2) days, with documentation of the refund transaction details. 
                </p>
                <p>There will be no 24 hour approval period for items held in our shop for longer than fourteen (14) days from the date of purchase. </p>
                <p>Items purchased that were on hold by deposit cannot be returned. No exceptions.  </p>

                <h3 class="mt-5 text-uppercase text-gold">AMPLIFIER SALES</h3>
                <p>All Amplifier sales are considered final, with no exceptions. </p>
                <p>We routinely ship all amplifiers in a custom constructed lightweight pinewood crate to add an extra layer of protection to the original factory packaging (box). This may marginally increase the shipping cost based on the overall dimensions and/or weight.  </p>
                <p id="shipping">As all Amplifier sales are considered final, the customer is welcome to opt-out and specify shipment without the wood crate, but we highly recommend this added layer of protection be used − which we are ‘happy’ to provide free of charge for materials and labor. </p>
                <h2 class="text-gold text-uppercase">Shipping</h2>
                <h3 class="mt-5 text-uppercase text-gold">International shipping</h3>
                <p>We usually ship internationally by FedEx or UPS. Upon customer request, we will try to accommodate special shipping requests. Customer pays all shipping, insurance and any bank charges, including any returned merchandise. If your transaction involves a trade, and you reject the instrument we send you, we reserve the choice to either return your trade instrument or refund the cash value allowed for it in the trade deal. All insurance claims regarding loss or damage during shipping are the responsibility of the customer. </p>


                <h3 class="mt-3 text-uppercase text-gold">
                    Local shipping
                </h3>

                <p id="other">
                    We will provide estimates for shipping by Herona, Tiki, Grab or J&T. Customer can specify their preferred carrier. Customer pays all shipping and insurance including for any returned merchandise. If your transaction involves a trade, and you reject the instrument we send you, we reserve the choice to either return your trade instrument or refund the cash value allowed for it in the trade deal. All insurance claims regarding loss or damage during shipping are the responsibility of the customer.
                </p>

                <h2 class="mt-5 text-uppercase text-gold">MISCELLANEOUS POLICIES</h2>
                <p>
                    All merchandise is subject to the possibility of prior sale. Items added to cart are not considered ‘held’ and may be sold. 
                </p>
                <p>
                    Prices are subject to change. We strive to keep prices updated as practically as possible.  
                </p>
                <p>
                    Prices are listed in USD (United States Dollars). If items are purchased in a currency other than USD, the foreign currency (sales) price will be based on our banks’ applicable foreign currency exchange rate at the time of sale, and can be viewed by customer on-line via link −upon request. 
                </p>
                <p>
                    We retain USD, SGD and IDR currency accounts so that no additional currency conversion fees will be incurred by either party.
                </p>
                <p>
                    We are not responsible for typographical and/or written errors. 
                </p>
                <p class="mt-3" >
                    All claims regarding loss or damage are the responsibility of the purchaser.
                </p>
                <p class=" ">
                    WE APPRECIATE YOUR BUSINESS!!! 
                </p>
                <div class="p-3 border-orange"></div>
            </section>
            <section class="recomendations mt-5">
                <h2 class="text-gold">OUR RECOMMENDATIONS</h2>
                <p class="text-white">Here’s a short list of our favorite Merchants we absolutely love.  And tell ‘em Felicity’s sent you! </p>
                <div class="row mx-0 mb-5">
                    <div class="col-md-2 bg-secondary">
                        
                    </div>
                    <div class="col-10 pl-md-5">
                        <p>Simply put; as guitar picks go, V-Picks are the best of the best. We've tried 'em all.. and nothing else even comes close. You will Love these Picks.</p>
                        <p>Check Them out here @ <a href="https://v-picks.com/">https://v-picks.com/</a></p>
                    </div>
                </div>
                <div class="row mx-0 mb-5">
                    <div class="col-md-2 bg-secondary">
                        
                    </div>
                    <div class="col-10 pl-md-5">
                        <p>Simply put; as guitar picks go, V-Picks are the best of the best. We've tried 'em all.. and nothing else even comes close. You will Love these Picks.</p>
                        <p>Check Them out here @ <a href="https://v-picks.com/">https://v-picks.com/</a></p>
                    </div>
                </div>
                <div class="row mx-0 mb-5">
                    <div class="col-md-2 bg-secondary">
                        
                    </div>
                    <div class="col-10 pl-md-5">
                        <p>Simply put; as guitar picks go, V-Picks are the best of the best. We've tried 'em all.. and nothing else even comes close. You will Love these Picks.</p>
                        <p>Check Them out here @ <a href="https://v-picks.com/">https://v-picks.com/</a></p>
                    </div>
                </div>
                <div class="row mx-0 mb-5">
                    <div class="col-md-2 bg-secondary">
                        
                    </div>
                    <div class="col-10 pl-md-5">
                        <p>Simply put; as guitar picks go, V-Picks are the best of the best. We've tried 'em all.. and nothing else even comes close. You will Love these Picks.</p>
                        <p>Check Them out here @ <a href="https://v-picks.com/">https://v-picks.com/</a></p>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $('#button-about').on('click', function(){
        $('.nav-about').toggleClass('open')
        
    })

    $('.aboutus').on('click',function(){
        if($(".nav-about").hasClass('open')){
            $('.nav-about').toggleClass('open')
        }
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/about-us.blade.php ENDPATH**/ ?>