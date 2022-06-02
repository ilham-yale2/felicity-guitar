<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => '1',
                'category_id' => '1',
                'brand_id' => '1',
                'code' => 'PRD-W6H1VN7P',
                'name' => '2004 RICKENBACKER 360/12 SEMI-HOLLOWBODY IN MONTEZUMA BROWN FINISH',
                'slug' => '2004-rickenbacker-36012-semi-hollowbody-in-montezuma-brown-finish',
                'text' => '<p><b>OVERVIEW</b></p><p>
A pristine example of one of Rickenbacker\'s most desirable limited edition and now discontinued "Color of the 
Year" finishes, this Montezuma Brown 360 sounds like a great Rickenbacker should, with a clear, open voice that 
translates well through the original Hi-Gain pickups.</p><p><b>DESCRIPTION
</b></p><p>The semi-hollow maple body and neck through construction affords the 360 a certain sonic richness and 
immediacy, and it\'s no wonder that top players of the British Invasion and folk boom of the 1960s gravitated 
towards Rickenbacker for their top notch construction and tone. Equipped with stereo "Rick-o-Sound" 
functionality and boasting Rickenbacker\'s Hi-Gain single coils, the guitar has a sweet, sparkling sound. The tone 
has great warmth and nuance, and when you strum a chord with authority, the instrument has a clear, cutting 
quality, inherent in maple as a tonewood. The guitar balances well on a strap and is featherweight at 7-lbs 3.8-oz..</p><p>The neck has a round, inviting C-shaped profile with a very comfortable shoulder, filling the palm comfortably and 
fretting easily. The gloss-finished bound rosewood fretboard boasts triangular pearl inlays, and the original slender 
frets are intact and pristine with perfectly rounded crowns and their full factory height. The guitar plays easily up 
the 24 3/4" scale with a straight neck and responsive, optimally adjusted truss rods. The original nut is intact and 
measures 1 5/8". On the headstock, the stock Schaller tuning machines work as they should and hold pitch well, 
with near perfect chrome plating.</p><p>All of the electronics function as intended, and everything is exactly how it was when the guitar left the 
Rickenbacker factory with untouched solder joints. The serial number on the stereo Rick-o-Sound jack plate dates 
the instrument to 2004. The chrome "R" tailpiece and six twin-saddle bridge is in perfect order, and the chrome 
plating is factory fresh. Cosmetically, this is truly a near mint instrument with only a bit of light pick wear on the 
treble side of the guard, and no nicks, dings, scuffs or other visible playwear.</p><p>The original hardshell case in excellent condition is included, along with the original manual and polish cloth.<br></p>',
                'thumbnail' => 'thumbnail/2004-rickenbacker-36012-semi-hollowbody-in-montezuma-brown-finish1652425540.jpg',
                'price' => '100000',
                'discount' => '0',
                'sell_price' => '100000',
                'created_at' => '2022-05-13 07:05:40',
                'updated_at' => '2022-05-17 06:33:54',
            ),
            1 => 
            array (
                'id' => '2',
                'category_id' => '1',
                'brand_id' => '8',
                'code' => 'PRD-9GT3LN17',
                'name' => '2010 GIBSON LES PAUL LTD. ED. ‘SLASH-AFD’ IN BUTTERSCOTCH ‘NO-BURST’ FINISH',
                'slug' => '2010-gibson-les-paul-ltd-ed-slash-afd-in-butterscotch-no-burst-finish',
                'text' => '<p><b>OVERVIEW</b></p><p>
The Guitar That Saved Rock N’ Roll 
This is a 2010 Gibson Slash Appetite for Destruction Les Paul, an (un-aged) near Replica of the Axe that Slash 
wielded when recording the legendary album of which the guitar\'s name comes from. The AFD Les Paul has 
Slash\'s preferred neck profile and his signature Seymour Duncan Humbucker pickups.</p><p><b>DESCRIPTION
</b></p><p>Working hard to record Guns N’ Roses’ 1987 debut, Appetite for Destruction, Slash was experiencing nothing but 
frustration trying to achieve the tones he was seeking with a range of contemporary electric guitars he was using. 
Then someone handed him a reissue-style Les Paul Standard, and that was all she wrote. With this legendary 
rock machine in hand, Slash laid down some of the best rock riffs of the decade — propelling songs like “Paradise 
City”, “Sweet Child O’ Mine” and “Welcome to the Jungle” — which fired up the biggest-selling debut album of 
all time in the process. Slash has been a devoted Les Paul player ever since, throughout his years with Guns N’ 
Roses and later with Slash’s Snakepit and Velvet Revolver.</p><p>This guitar is in pristine condition. She was part of a very extensive collection and unplayed beside a few hours 
in the one-owner-collector’s home setting. After being personally autographed by “Slash” in 2012, she has been 
kept inside her case in a climate and humidity controlled guitar cellar until coming to us very recently. She 
includes her OHSC in excellent condition, and a few extras.</p><p>We rate this guitar a solid 9.5/10 (E+) being in near-mint condition. Because of the autograph/signature — which 
technically ‘defaces’ the finish — we can’t rate this guitar ‘mint’ condition whilst adhering to Reverb.com and 
trade standards.</p><p><b>This Gibson LP Slash-AFD at a glance</b></p><ul><li>Grade-AAA Flamed Maple top; Long sustain with crisp, bright tone</li><li>Mahogany back and neck; Warm, focused and present midrange
 Bound rosewood fretboard; Open, warm tone and smooth playing feel
</li><li>Custom Slash-Profile (50s-style medium C-profile) Neck</li><li>Un-chambered weight-relieved version of the classic Les Paul Standard</li><li>Seymour Duncan® Slash Signature Alnico II Pro Zebra Bobbin Humbucker pickups</li><li>Dunlop® Strap Locks</li><li>Hand-signed / autographed Body “Slash 2012”, in permanent fiber-tip marker including L.O.A.&nbsp;</li></ul>',
                'thumbnail' => 'thumbnail/2010-gibson-les-paul-ltd-ed-slash-afd-in-butterscotch-no-burst-finish1652772595.jpg',
                'price' => '1000000',
                'discount' => '0',
                'sell_price' => '1000000',
                'created_at' => '2022-05-17 07:29:56',
                'updated_at' => '2022-05-17 07:29:56',
            ),
            2 => 
            array (
                'id' => '3',
                'category_id' => '2',
                'brand_id' => '8',
                'code' => 'PRD-IHO88ZJA',
                'name' => '2013 GIBSON MONTANA J-35 ACOUSTIC IN ANTIQUE NATURAL FINISH',
                'slug' => '2013-gibson-montana-j-35-acoustic-in-antique-natural-finish',
                'text' => '<p><b>OVERVIEW</b></p><p>
A classic sloped-shoulder flat-top for today’s player. Traditional specs, superb tone, and contemporary 
performance; the iconic J-35.
</p><p>Introduced in 1936, the J-35 was Gibson\'s answer to a call for a quality, handcrafted guitar with unrivaled tone 
and an incredible price. The 2013 J-35 is the modern equivalent of that original round-shoulder flat-top with 
Gibson\'s historically celebrated, full-bodied acoustic tone. The J-35 became one of Gibson’s most popular prewar 
flattops and remained in production until 1942, when it was replaced by the J-45. The company recently 
reintroduced the J-35 to its Gibson Acoustic line, which is built in Bozeman, Montana, and today’s J-35 has all the 
sonic and aesthetic charm of its ancestor.</p><p> 
Reborn for the same reasons that brought the original to the market, the J-35 is handcrafted with solid tone woods 
and all the acclaimed skill of Gibson Acoustic’s luthiers of Bozeman, Montana. The spruce top and mahogany back 
and sides produce the warm, expressive tone sought after by renowned artists, acoustic connoisseurs, record 
producers and sound engineers. The short-scale neck with dovetail neck-to-body joint, attached with traditional 
hot hide glue, provides for smooth tonal response and easy playing.</p><p> 
Antique Natural finish hand-sprayed with Gibson\'s signature nitrocellulose lacquer preserves the natural grain and 
lends a clean, modern look, while enhancing the guitar’s resonance. A unique fire stripe pick guard, multi-ply top 
binding and soundhole rosette, and a Gibson script and banner logo make it easy to distinguish the J-35 in the 
family of round-shoulder dreadnoughts.</p><p> 
Equipped with a Baggs Element pickup, the J-35 is a go-to favorite for vocal accompaniment on stage or in the 
studio. Gibson Montana hardshell case is included.&nbsp;</p><p><b>Gibson Montana J-35 Acoustic at a glance</b></p><ul><li>&nbsp;L.R. Baggs Element active pickup system; plug into an amp or a PA system</li><li> Premium Tonewoods; sitka spruce top and mahogany back and sides for excellent projection</li><li>Neck Fit; compound dovetail joined at 14th fret using Hot Hide glue in classic tradition</li><li>Classic pre-war vintage looks; multi-ply top binding, single ply back binding, traditional rosette, 40\'s style 
firestripe pickguard and gold script banner with Gibson logo</li><li>Classic Gibson hardshell case: stylish and protective</li></ul>',
                'thumbnail' => 'thumbnail/2013-gibson-montana-j-35-acoustic-in-antique-natural-finish1652851382.jpg',
                'price' => '1000000',
                'discount' => '0',
                'sell_price' => '1000000',
                'created_at' => '2022-05-18 05:23:02',
                'updated_at' => '2022-05-18 05:23:02',
            ),
            3 => 
            array (
                'id' => '4',
                'category_id' => '1',
                'brand_id' => '7',
                'code' => 'PRD-PRCVQASR',
                'name' => '2013 IBANEZ J-CUSTOM RG20136-BSZ-00 LTD ED IN SMOKE BROWN TOPAZ FINISH',
                'slug' => '2013-ibanez-j-custom-rg20136-bsz-00-ltd-ed-in-smoke-brown-topaz-finish',
                'text' => '<p><b>OVERVIEW</b></p><p>
Ibanez J-Custom model guitar meticulously handcrafted by selected master builders at the Japanese Ibanez Custom 
Shop. An instrument complimented with the pinnacle of professional appointments and at an outstanding pricequality threshold.&nbsp;</p><p><b>DESCRIPTION</b></p><p>
The 40-mm African mahogany body with sublime 4-mm AAAA quilted maple top is a true thing of beauty and prime 
example of Ibanez’ master craftsmanship. The J-Custom’s 25.5”-in. scale, 5-pc maple &amp; walnut neck with KTS 
titanium reinforcement and bolt-on neck construction enables a fast, precise attack response, while retaining a full, 
"fat" tone. The selected ebony fretboard with flamed maple binding and genuine Mother of Pearl "Tree Of Life" 
inlay makes for a warm and effortlessly smooth playing Axe as well as a very classy looking instrument!&nbsp;</p><p>The Ibanez Edge Zero locking tremolo with Ibanez ZPS3 isthe ultimate tremolo system loaded with unique features, 
such as the built-in intonation adjustment tool and the arm-holder adjustment screw. The Ibanez ZPS3 (Zero Point 
System) constructed with Duralumin prevents typical tuning problems of other locking tremolo systems. The 
onboard Dimarzio Air Norton (neck) humbucker, Dimarzio True Velvet (middle) singlecoil and Dimarzio Tone Zone 
(bridge) humbucker combination is extremely versatile, provides lots of gain for aggressive sounds as well as plenty 
of great clean sounds, and is ideal for drop-down tunings.</p><p>The guitar comes in the original Ibanez "Team J. Craft" form-fit case, with factory accessories &amp; certificate of
authenticity.</p><p>&nbsp;2013 Ibanez J-Custom RG20136-BSZ-00 Ltd Ed at a glance</p><ul><li>&nbsp;Solid African Mahogany body with AAAA figured Maple top</li><li>Cosmo Black Hardware</li><li>RG J-Custom Super Wizard 5pc Maple/Wenge neck with KTS Titanium Reinforcement</li><li> Trio of DiMarzio® Tone Zone™ Humbucking, True Velvet™ Singlecoil and Air Norton™ Humbucking 
Pickups</li><li> Ibanez® Edge Zero locking Tremolo ZPS3</li><li> Gotoh® Machine Heads with 16:01 tuning ratio</li><li> Gotoh® Strap Locking Pins
 Limited Edition with Hardbound Certificate of Authenticity</li></ul>',
                'thumbnail' => 'thumbnail/2013-ibanez-j-custom-rg20136-bsz-00-ltd-ed-in-smoke-brown-topaz-finish1652859724.jpg',
                'price' => '1000000',
                'discount' => '0',
                'sell_price' => '1000000',
                'created_at' => '2022-05-18 07:42:04',
                'updated_at' => '2022-05-18 07:42:04',
            ),
            4 => 
            array (
                'id' => '5',
                'category_id' => '2',
                'brand_id' => '11',
                'code' => 'PRD-HJJ8Q5O5',
                'name' => '2016 EPIPHONE HUMMINGBIRD PRO ACOUSTIC IN FADED CHERRY SUNBURST FINISH',
                'slug' => '2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish',
                'text' => '<p><b>OVERVIEW</b></p><p>
Epiphone’s Hummingbird Pro is each made with a classic look and powered by the latest technology. Epiphone 
first made its mark in the music business by first designing and then perfecting the modern acoustic guitar. And 
today, Epiphone’s collection of “PRO” Acoustic/Electric guitars are creating new standards among pro’s and<i> pro’s at-heart.&nbsp;</i></p><p><b>DESCRIPTION
</b></p><p>The classic Hummingbird style acoustic guitar first introduced at the legendary Gibson and Epiphone factory in 
Kalamazoo in 1962 became one of the first acoustic guitars to become a recognized rock and roll icon. Now, both 
beginners and professionals can enjoy the classic sound of The Hummingbird Pro plugged in with the Epiphone Shadow™ ePerformer™ Preamp System.</p><p>The Hummingbird PRO Acoustic/Electric has a beautiful Faded Cherry Sunburst color finish and features a Solid 
Spruce top with 5-ply white and black binding. The body back and sides are made from laminated Mahogany for 
a punchy, bright tone. The hard Mahogany 24.72″ scale neck has a slim taper “D” profile fixed solidly to the body 
using a Dovetail joint and Titebond™ glue.</p><p><b>Shadow Pickup System
</b></p><p>Epiphone and Shadow Germany have worked together for over a decade at perfecting ways to amplify an acoustic 
guitar on stage. The Hummingbird PRO is just one of many Epiphone guitars that feature a cutting edge pickup 
system that can handle any size gig and still produce an "acoustic" sound. The Hummingbird PRO\'s controls for 
the Shadow™ ePerformer™ Preamp are on the upper bout and include controls for Master Volume, Treble and 
Bass EQ, Mute, and a Dynamics control adjusted via a frequency curve.&nbsp;</p><p>The Hummingbird Pro is an incredible guitar for the money and a great knockoff of the 51-year-old Gibson® 
original.</p><p>This guitar is in near-mint condition with virtually no signs of playwear. The Grover® tuning machine buttons show 
signs of light oxidation, or we would earnestly rate this guitar as ‘mint’. A good fitting custom-ordered black 
hardshell case is included.</p><p><span style="color: rgb(0, 0, 0); font-size: 0.875rem; letter-spacing: 0.0312rem;"><br></span></p><p><span style="color: rgb(0, 0, 0); font-size: 0.875rem; letter-spacing: 0.0312rem;"><b>The Epiphone Hummingbird Pro at a glance</b></span></p><ul><li><span style="color: rgb(0, 0, 0); font-size: 0.875rem; letter-spacing: 0.0312rem;">&nbsp;Solid Spruce top with laminated mahogany back and sides provide warm, strong projection and crisp, clear 
highs</span></li><li>&nbsp;Slim taper ‘D’ profile Mahogany neck with Pau Ferro fingerboard feels very comfortable and plays effortlessly</li><li>&nbsp;Paul Ferro (Reverse Belly) Bridge-plate with Compensated Bone Saddle</li><li>Grover® Rotomatic® 15:1 ratio tuners</li><li>Epiphone-Shadow™ ePerformer™ Preamp System Master Volume, Treble and Bass EQ, Mute, and Dynamic
Controls</li><li>Custom Acoustic hardshell guitar case included<span style="color: rgb(81, 83, 101); font-size: 0.875rem; letter-spacing: 0.0312rem;">&nbsp;</span></li></ul><p><br></p><p><br></p>',
                'thumbnail' => 'thumbnail/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish1652863280.jpg',
                'price' => '1000000',
                'discount' => '0',
                'sell_price' => '1000000',
                'created_at' => '2022-05-18 08:41:20',
                'updated_at' => '2022-05-18 08:41:20',
            ),
            5 => 
            array (
                'id' => '6',
                'category_id' => '1',
                'brand_id' => '8',
                'code' => 'PRD-3WD12PFN',
                'name' => '2014 GIBSON LTD. ED. ‘LZZY HALE’ SIGNATURE EXPLORER IN ALPINE WHITE FINISH',
                'slug' => '2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish',
                'text' => '<p><b>OVERVIEW
</b></p><p>Gibson says; as a guitarist, singer and frontperson of the band “Halestorm”, Lzzy Hale has been rocking hard since 
her mid-teens. Her very individual style and attitude demand a guitar that makes an equally bold statement—which 
the new Limited Edition Lzzy Hale Explorer from Gibson® U.S.A. delivers in spades. From its iconic rebellious body 
shape, to its stunning Alpine White finish and gold appointments, this Explorer stands out even amid the history of 
attention-grabbing Modernist models. And it’s primed for powerful tone too, with Gibson’s popular ‘57 Classic and 
‘57 Classic Plus pickups, select tonewoods, and high-quality locking hardware. To top it all off, the super-fast neck 
and unparalleled Gibson set-up will send you sizzling with incendiary riffs or laying down fat, chunky rhythm, 
whatever the gig requires. The guitar comes protected in a Vintage Brown Gibson hardshell case that is an absolute 
tank.</p><p>This guitar came to us in new/unplayed condition as ‘new old stock’ from a guitar shop in New Zealand. At the time 
of purchase this model was sold out everywhere acrossthe US, so we’re probably invested in shipping and customs 
fees more than we’d like to be. The Alpine White nitro lacquer finish is stunning and set against the all gold 
appointments really makes it stand out amongst your more standard Gibson finishes. She is in pristine condition 
except for one approx. 1 x 1-mm pin-point dent just above the bridge, which is only visible if purposely looking for 
it at exactly the right (or wrong) angle from very close up. We only noticed it when photographing the guitar under 
professional studio lighting, and even then we weren’t able to capture it well in our photos.</p><p>This guitar has never been played, and has only had a basic setup with new strings and intonation adjustments. 
And it shows. She’s an absolute beauty. The Gibson® protective plastic film is still in place on the pickguard and 
rear control-plate cover as when it left the factory. The truss rod has never been touched (or needed to be), the 
action is set very low and there is no buzz or dead spots anywhere up and down the neck. The ‘57 Classic pickups 
are very well balanced and all the electronics work perfectly as they should. The frets have zero playwear. All the 
gold hardware is untarnished and looks like new. We upgraded the original plastic speed knobs with a much nicer 
looking and feeling trio of gold-plated “UFO” knobs with genuine Mother of Pearl inserts which have more 
‘substance’ and solid-feel behind them when rolling the volume and tone controls, and have also included a pair 
of (unopened) genuine “Schaller® gold-plated strap locks in the case. The original plastic speed-knobs are also 
included. We fortuitously happened to have a brand new 3.5”-wide Levy\'s alpine white leather guitar strap in the 
shop which suits this guitar so ideally, we feel that the strap should accompany this Beauty on her ultimate journey
onward</p><p>You can be the first person to sling this spectacular Axe around your shoulders and play it. We rate this guitar a 
solid 9.5/10 - but for the micro-dent.</p><p><br></p><p><b>2014 Gibson Ltd Ed ‘Lzzy Hale’ Signature Explorer at a glance</b></p><ul><li>&nbsp;Mahogany Body and Neck; Rich, warm, focused sound and added sustain</li><li>Flashy Gold Hardware on Alpine White; beautiful and classy look will stand out in any situation</li><li>\'57 Classic and \'57 Classic Plus pickups; Rich, vintage PAF tone that\'s warm, deep, and edgy</li><li>Bound Rosewood fretboard; Open, warm tone and smooth playing feel</li><li>Slim Taper Neck profile; super-fast and makes playing up and down the neck a delight</li><li>Lightweight Body; is incredibly comfortable to play over long gigs</li><li>Comes with Complimentary upgrades; gold with Mother of Pearl ‘UFO’ knobs, a matching Alpine White 3” 
“Levy’s” Leather strap and gold ‘Schaller’ strap locks (in case pocket).&nbsp;&nbsp;</li></ul>',
                'thumbnail' => 'thumbnail/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish1652864744.jpg',
                'price' => '1000000',
                'discount' => '0',
                'sell_price' => '1000000',
                'created_at' => '2022-05-18 09:05:45',
                'updated_at' => '2022-05-18 09:05:45',
            ),
            6 => 
            array (
                'id' => '7',
                'category_id' => '2',
                'brand_id' => '5',
                'code' => 'PRD-TQSNLUWL',
            'name' => '2015 TAYLOR 214CE-K DLX (KOA WOOD) ACOUSTIC GUITAR IN NATURAL FINSIH',
                'slug' => '2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih',
                'text' => '<p><b>OVERVIEW
</b></p><p>An exotic Hawaiian KOA wood makeover for the 200 Series. The 200 Series Deluxe category is loaded with high-end performance appeal. The Grand Auditorium 214ce-K DLX features beautiful layered koa back and sides, a solid 
Sitka spruce top, a full-gloss body, white binding, Small Diamond fretboard inlays, Venetian cutaway, Taylor 
Expression System 2 electronics, and a Taylor standard hardshell case.</p><p><b>DESCRIPTION</b></p><p>
The Taylor Expression System® 2 (ES2) is a revolutionary pickup design that delivers the latest in Taylor’s ongoing 
innovation in acoustic guitar amplification. The heart of the Expression System 2 is Taylor’s patented behind-the-saddle pickup, which features three uniquely positioned and individually calibrated pickup sensors. The location of 
the sensors enables a more dynamic range of acoustic sound to be captured than ever before. Together with 
Taylor’s custom-designed “professional audio”-grade preamp, this system produces exceptional amplified tone and 
responsiveness.<br></p><p>The satin neck finish has a much more open-pore in feel, which lends a really organic feel to the neck. The profile 
is less slim than you might expect; a hint of a ‘V’ in the lower positions is really comfortable for thumb-around 
styles, and as you progress up the neck it rounds out a little for a fuller oval, but is not over-deep for thumb-behind 
lead lines. Setup is typically good as you would expect from a Taylor; light but not overly so, and intonation is 
excellent. High-fret notes meld with open-string drones without any adjustment.</p><p>The grand auditorium sound projection is much bolder than the guitar looks, with the same length and width as 
Taylor\'s dreadnought; the difference lies in the more pinched waist. With its cutaway − a flat Venetian-style most 
often used on Latin acoustic guitars, rather than the slightly upturned cutaway of the USA models − it assumes a 
more classic and modern Taylor-esque appearance, even though the cutaway almost references the classic Django 
Reinhardt Selmer-Maccaferri design. Very cool.
</p><p><span style="color: rgb(0, 0, 0); font-size: 0.875rem; letter-spacing: 0.0312rem;">Taylor\'s grand auditorium is the definition of the modern electro steel-string, and this deluxe version is well aimed. 
With its upgraded pickup system, all-gloss exotic wood body and a hard case, it\'s a superb Taylor design that will 
provide the sonic needs performing artists want, and at an affordable price.</span></p><p><span style="color: rgb(0, 0, 0); font-size: 0.875rem; letter-spacing: 0.0312rem;"><br></span></p><p><b>2015 TAYLOR 214CE-K DLX Acoustic at a glance</b></p><ul><li>Taylor® Expression System 2 electronics; plug into an amp or a PA system</li><li>Premium Tonewoods; sitka spruce top and layered Koa wood back and sides for excellent projection</li><li>Sapele Neck; West African Crelicam Ebony with Italian Acrylic Small Diamonds inlays in classic Taylor®
tradition</li><li>Grand Auditorium Body with Taylor’s unique and stylish ‘flat’ Venetian-style cutaway, yield outstanding 
sound projection</li><li>Classic Taylor® hardshell case: stylish and protective</li></ul><p><span style="font-size: 0.875rem; letter-spacing: 0.0312rem;">&nbsp;</span><br></p>',
                'thumbnail' => 'thumbnail/2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih1652942954.jpg',
                'price' => '1000000',
                'discount' => '0',
                'sell_price' => '1000000',
                'created_at' => '2022-05-19 06:49:15',
                'updated_at' => '2022-05-19 06:49:15',
            ),
        ));
        
        
    }
}