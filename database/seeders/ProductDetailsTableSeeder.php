<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_details')->delete();
        
        \DB::table('product_details')->insert(array (
            0 => 
            array (
                'id' => '1',
                'product_id' => '1',
                'description' => '-',
            'condition' => 'Mint (like new/unplayed)',
                'number_of_strings' => '12',
                'orientation' => 'Right handed',
                'made_in' => 'U.S.A',
                'year' => '2004',
                'type' => 'Semi-Acoustic',
                'shape' => 'Double Cutaway, Rick-360 Series, 15” width 1-1/2” depth',
            'material' => '2-pc Maple (each front & back)',
                'carve' => 'Front: Flat w/rounded Rims, Back: Flat',
                'binding' => 'Front: No, Back: Single-ply Cream',
                'weight_relief' => 'Semi-Hollow',
                'build_material' => 'Rickenbacker Proprietary Bonding Glue',
                'body_finish_type' => 'High Gloss Poly',
                'color' => 'Front: Montezuma Brown Burst, Back & Neck: Montezuma Brown Burst',
                'neck_material' => 'o',
                'truss_rod' => 'Standard ‘Rick’ 2-way Adjustable',
                'truss_rod_cover' => '1-ply White no-bevel ‘Shark Fin’ with Hot-stamped Black ‘Rick’ Logo & Made in U.S.A.',
            'peghead_particular' => 'Front: Unbound, 5-pc Maple/Walnut Natural Gloss with 6-on-a-side Tuning Peg Routes, Back: Plain (no Markings or SN)',
                'neck_profile' => 'Round C-shape',
                'fingerboard_material' => 'Rosewood',
                'crown_radius' => '10',
                'scale_length' => '24.75',
                'frets' => '24 Medium',
                'nut_size' => '1.629" / Bakelite',
                'neck_width' => '1.618” at 1st fret / 1.971” at 12th fret',
                'neck_depth' => '0.840" at 1st fret / 0.890" at 12th fret',
                'inlays' => 'Triangular ‘Wedge’ White Pearl',
                'neck_binding' => 'Cream White',
                'side_dots' => 'Black',
                'neck_joint' => 'Long Tenon Set Neck Through',
                'bridge' => 'Chrome Plated, ‘Rick’ 12-string Bridge with 6 twin-saddles and Cover',
                'tailpiece' => 'Chrome Plated, Floating “R” Trapeze',
                'tuning_machines' => 'Chrome Plated, Schaller® Deluxe 6-on-a-Side with Chrome Buttons, 15:01 Ratio',
                'pickup_cover' => 'Chrome Plated, with Flat Black Mounting Rings',
                'strap_buttons' => 'Polished Aluminum End Pins',
                'pickguard' => '‘Rick’ 2-layer Single-ply, White Plexi ‘Terraced’ ConfigBlack Ribbed Knobs with Silver Reflector Inserts and no Dial Pointers',
                'control_knobs' => 'Black Ribbed Knobs with Silver Reflector Inserts and no Dial Pointers',
                'switch' => 'Black Plastic Tip',
                'bridge_pickup' => 'Chrome Plated, Rickenbacker High Gain Single-coil, Ceramic, DCR 14.4k',
                'middle_pickup' => '0',
                'neck_pickup' => 'Chrome Plated, Rickenbacker High Gain Single-coil, Ceramic, DCR 11.2k',
                'active_passive' => 'Passive',
                'series_pararell' => 'Series',
                'control' => '2 Volume, 2 Tone, 1 x Mix Control, 3-position Pickup Toggle',
                'mono_stereo' => 'Mono & Stereo "Rick-o-Sound" Output',
                'vol_pontentiometer' => '330k Linear AT',
                'pontentiometer' => '330k Linear AT',
                'capacitor' => '022uF – 20% - 50v values',
                'harnesst' => '360-Series Standard Configuration Wiring',
                'push_pull' => '0',
                'piezo' => '0',
                'active_eq' => '0',
                'kill_switch' => '0',
                'output_jack' => '1/4" 2-Conductor',
                'case' => 'Rickenbacker® U.S.A. Form-fit Hardshell Case, Black w/black Interior',
                'strap_lock' => '0',
                'strings' => 'Pyramid® .010/.010, .013/.013, .020/.010, .026/.013, .036/.020, .046/.026 Gauges',
            'tools' => 'Rickenbacker ® U.S.A. Polishing Cloth (used)',
                'manual' => 'Rickenbacker ® U.S.A. Warranty Pamphlet',
                'coa' => '0',
                'other' => '0',
                'weight' => 'Is the actual weighed-value in US Standard Units',
                'disclosure' => 'Some technical Specs may have been extracted from Rickenbacker® U.S.A. and/or internet  archives. The words Rickenbacker® / Schaller® / Pyramid® and the associated designs are  registered tra',
                'created_at' => '2022-05-13 07:05:40',
                'updated_at' => '2022-05-18 03:56:39',
            ),
            1 => 
            array (
                'id' => '2',
                'product_id' => '2',
                'description' => '-',
                'condition' => 'E+ / Unplayed / Autographed by Slash',
                'number_of_strings' => '6',
                'orientation' => 'Right-handed',
                'made_in' => 'U.S.A',
                'year' => '2010',
                'type' => 'Solidbody',
                'shape' => 'LP Singlecut',
                'material' => '2-pc Mahogany with 2-pc matched AAA-Grade Flamed Maple Top',
                'carve' => 'Front: Figured, Back: Flat',
                'binding' => 'Front: 1-ply Ivory White, Back: Unbound',
                'weight_relief' => 'Un-chambered',
                'build_material' => 'Franklin Titebond 50 Glue',
                'body_finish_type' => 'High-gloss Nitrocellulose Lacquer',
                'color' => 'Front: Butterscotch “no burst”, Back & Neck: Transparent Red',
                'neck_material' => '1-pc Mahogany',
                'truss_rod' => 'LP Standard 2-way Adjustable',
                'truss_rod_cover' => '2-ply B/W Bell Style',
                'peghead_particular' => 'Front: Unbound, Gloss Black with MOP Gibson® Logo Inlay & Gold Silkscreen ‘Slash’',
            'neck_profile' => 'Custom “Slash-Profile” (‘50s-style Medium ‘C’)',
                'fingerboard_material' => 'Dark Rosewood',
                'crown_radius' => '12',
                'scale_length' => '24.75',
                'frets' => '22 Medium Jumbo',
                'nut_size' => '1-11/16” / Synthetic Bone',
                'neck_width' => '1.702” at 1st fret / 2.090” at 12th fret / 2.260” at E.O.B.',
                'neck_depth' => '0.790" at 1st fret / 0.910" at 12th fret',
                'inlays' => 'Acrylic ‘MOP’ Trapezoids',
                'neck_binding' => 'Ivory White',
                'side_dots' => 'Black',
                'neck_joint' => 'Mortise and Tenon, Franklin Titebond 50 Glue',
                'bridge' => 'Nickel, ABR-1 with Titanium Saddles, Zamak',
                'tailpiece' => 'Nickel, Stop Bar, Zamak',
                'tuning_machines' => 'Nickel, Kluson® Deluxe 3-on-a-Side with Green Keystone Buttons, 15:01 Ratio',
                'pickup_cover' => 'Uncovered Zebra / Arched White Humbucker Mounting Rings',
                'strap_buttons' => 'Dunlop® Strap Lock End Pins',
                'pickguard' => 'No',
                'control_knobs' => 'Gold Top Hats with Silver Reflector Inserts & Nickel Dial Pointers',
                'switch' => 'Black Plastic Tip / Cream/Silver-print Washer',
                'bridge_pickup' => 'Seymour Duncan® ‘Slash Signature’ Alnico II Pro Zebra Humbucker - DCR 8.9k',
                'middle_pickup' => '0',
                'neck_pickup' => 'Seymour Duncan® ‘Slash Signature\' Alnico II Pro Zebra Humbucker - DCR 8.3k',
                'active_passive' => 'Passive',
                'series_pararell' => 'Series',
                'control' => '2 Volume, 2 Tone, 3-position Pickup Toggle Switch',
                'mono_stereo' => NULL,
                'vol_pontentiometer' => '500k Linear AT',
                'pontentiometer' => '500k Linear AT',
                'capacitor' => '022uF – 20% values',
                'harnesst' => 'Gibson® LP Standard Configuration Wiring',
                'push_pull' => '0',
                'piezo' => '0',
                'active_eq' => '0',
                'kill_switch' => '0',
                'output_jack' => 'Switchcraft™ 1/4" 2-Conductor',
                'case' => 'Black Gibson® U.S.A. Deluxe “Slash A.F.D.” OHSC w/white interior & Silkscreen ‘Slash’ Artwork, 5-latch w/lock-hasp',
                'strap_lock' => '0',
                'strings' => 'Elixir® Polyweb .010, .011, .016, .026, .036, .047 Gauges',
                'tools' => 'Gibson® U.S.A. Truss Rod Wrench',
                'manual' => 'Gibson® U.S.A. Owner’s Manual, Pre-ship Factory Checklist',
                'coa' => '0',
                'other' => '0',
                'weight' => 'Is the actual weighed-value in US Standard Units',
                'disclosure' => 'Some technical Specs may have been extracted from Gibson® U.S.A. and/or internet archives.  The words Gibson® / Seymour Duncan® / Kluson® / Dunlop® / Slash and the associated designs  are reg',
                'created_at' => '2022-05-17 07:29:58',
                'updated_at' => '2022-05-17 08:03:59',
            ),
            2 => 
            array (
                'id' => '3',
                'product_id' => '3',
                'description' => '-',
            'condition' => 'New (NOS)',
                'number_of_strings' => '6',
                'orientation' => 'Right-handed',
                'made_in' => 'U.S.A',
                'year' => '2013',
                'type' => 'J-35 Series Hollowbody Acoustic',
                'shape' => 'Slope-shoulder Dreadnought, 16” wide Flat Top',
                'material' => 'Front: 1-pc Solid Sitka Spruce,  Back: 2-pc Solid Mahogany,  Rims: Mahogany',
                'carve' => 'Front: Flat Top,  Back: Flat',
                'binding' => 'Front: 4-ply W/B/W/B,  Back: 1-ply White',
                'weight_relief' => NULL,
            'build_material' => 'Hot-hide Glue (neck-joint) and Franklin Titebond 50 Glue (body)',
                'body_finish_type' => 'High-gloss Nitrocellulose Lacquer',
                'color' => 'Front: Antique Natural Back & Neck: Antique Natura',
                'neck_material' => NULL,
                'truss_rod' => 'Standard 2-way Adjustable',
            'truss_rod_cover' => '2-ply B/W Beveled Bell-style with Etched White ‘J-35 Reissue’ (+ Original Blank in Case)',
                'peghead_particular' => 'Front: Unbound, Gloss Black with Gold Silkscreen Gibson® Logo & ‘Only a Gibson is  Good Enough’ Script Banner,  Back: Wood-stamped ‘Made in USA’ and Serial Number',
                'neck_profile' => 'Round',
                'fingerboard_material' => 'Rosewood',
                'crown_radius' => '12',
                'scale_length' => '24.75',
                'frets' => '14 Vintage Medium',
                'nut_size' => '1.725 / Tusq',
                'neck_width' => '1.710” at 1st fret / 2.080” at 12th fret / 2.260” at E.O.B',
                'neck_depth' => '0.800" at 1st fret / 0.860" at 12th fret',
                'inlays' => 'Mother of Pearl Dot Inlays',
                'neck_binding' => 'No',
                'side_dots' => 'White Acrylic',
                'neck_joint' => 'Dovetail Neck Joint bonded with Hot-hide Glue',
                'bridge' => 'Tusq on Rosewood Base with ‘MOP’ Dot-inlays / 2−7/32"string spacing at saddle',
                'tailpiece' => 'No',
                'tuning_machines' => 'Nickel Plated Gibson® Vintage-style tuners, Ivory-white Plastic Buttons / 15:1 Ratio',
                'pickup_cover' => NULL,
            'strap_buttons' => '1 Black Aluminum End Pin (at Neck Heel) and 1 LR Baggs® Aged Brass (output jack)',
                'pickguard' => 'Single-ply 1940\'s Style ‘Firestripe’',
                'control_knobs' => NULL,
                'switch' => NULL,
                'bridge_pickup' => 'L.R. Baggs® Element Active Pickup System',
                'middle_pickup' => '0',
                'neck_pickup' => NULL,
                'active_passive' => 'Active',
                'series_pararell' => NULL,
                'control' => 'Soundhole Mounted Volume Control',
                'mono_stereo' => NULL,
                'vol_pontentiometer' => NULL,
                'pontentiometer' => NULL,
                'capacitor' => NULL,
                'harnesst' => NULL,
                'push_pull' => '0',
                'piezo' => '0',
                'active_eq' => '1',
                'kill_switch' => '0',
                'output_jack' => 'LR Baggs® 1/4" 2-Conductor Mono',
                'case' => 'Gibson® Acoustic OHSC Black with Royal Blue Velour Interior, Silkscreen Gibson® Logo',
                'strap_lock' => '0',
                'strings' => 'Elixir® 16027 Nanoweb Phosphor Bronze Acoustic .011-.052 Gauges',
                'tools' => 'No',
                'manual' => 'Gibson® Montana Owner’s Manual, Gold Warranty Card',
                'coa' => '0',
                'other' => '1',
                'weight' => 'Is the actual weighed-value in US Standard Units',
                'disclosure' => 'e Some technical specs above are taken from Gibson® / LR Baggs® website / internet archives. The  words Gibson® / LR Baggs® / Elixir® and the associated designs are registered trademarks of  ',
                'created_at' => '2022-05-18 05:23:07',
                'updated_at' => '2022-05-18 06:06:11',
            ),
            3 => 
            array (
                'id' => '4',
                'product_id' => '4',
                'description' => '-',
            'condition' => 'New (NOS)',
                'number_of_strings' => '6',
                'orientation' => 'Right-handed',
                'made_in' => 'Japan',
                'year' => '2013',
                'type' => 'Solidbody',
                'shape' => 'J-Custom Offset Double Cutaway',
                'material' => '2-pc African Mahogany with 2-pc Grade AAAA 4-mm Quilted Maple Top',
                'carve' => 'Front: Flat w/Arm Comfort Contour,  Back: Flat w/Waist Contour',
                'binding' => 'Front: 1-ply Flamed Maple,  Back: Unbound',
                'weight_relief' => 'Modern Chambered',
                'build_material' => 'Ibanez® Proprietary Bonding Adhesive',
                'body_finish_type' => 'High-gloss Nitrocellulose Lacquer',
                'color' => 'Front: Smoky Brown Topaz,  Back & Neck: Transparent Burgundy',
                'neck_material' => 'RG J-Custom Super Wizard 5pc Maple/Wenge neck with KTS Titanium Reinforcement',
                'truss_rod' => '2-way Adjustable Bi-flex',
                'truss_rod_cover' => 'Uncovered',
                'peghead_particular' => 'Front: Unbound, RG-style matching headstock with Ibanez® Logo & J.custom Laminate, Back: Hologram, KTS and Serial Number Decals',
                'neck_profile' => 'Asymmetric ‘Super Wizard\'',
                'fingerboard_material' => 'Selected Bound Macassar Ebony',
                'crown_radius' => '16',
                'scale_length' => '25.5',
                'frets' => '24 Jumbo Frets / J-Custom fret edge treatment',
                'nut_size' => '1.693” / FR-style locking',
                'neck_width' => '1.693” at 1st fret / 2.106” at 12th Fret / 2.283” at 24th fret',
                'neck_depth' => '0.669” at 1st Fret / 0.748” at 12th Fret',
                'inlays' => 'Genuine Abalone and Mother of Pearl “Tree Of Life” inlays',
                'neck_binding' => 'Flamed Maplewood binding',
                'side_dots' => 'Black',
            'neck_joint' => 'Bolt-on w/Access Heel (AANJ)',
                'bridge' => 'Ibanez® Edge Zero locking Tremolo ZPS3, Duralumin, 0.42520” String Spacing',
                'tailpiece' => 'No',
            'tuning_machines' => 'Gotoh® SG381 (non-locking) Machine Heads, 16:01 Ratio',
                'pickup_cover' => 'Uncovered, no Mounts or Dress Rings',
                'strap_buttons' => 'Gotoh® Free Lock Pins',
                'pickguard' => 'No',
                'control_knobs' => 'Knurled Body, Oval-top, with no Dial Pointers',
            'switch' => 'Black Plastic Tip 5-pos Sliding (Strat Style)',
                'bridge_pickup' => 'DiMarzio® Tone Zone™ Humbucking, Alnico V, DCR 17.31k',
                'middle_pickup' => '1',
                'neck_pickup' => 'DiMarzio® Air Norton™ Humbucking, Alnico V, DCR 12.58 k',
                'active_passive' => 'Passive',
                'series_pararell' => 'Series',
                'control' => '1 Volume, 1 Tone, 5-Way Pickup Toggle',
                'mono_stereo' => NULL,
                'vol_pontentiometer' => '500k Linear AT',
                'pontentiometer' => '500k Linear AT',
                'capacitor' => '022uF – 20% − 100v values',
                'harnesst' => 'Ibanez® J-Custom Hand-wired Harness',
                'push_pull' => '0',
                'piezo' => '0',
                'active_eq' => '0',
                'kill_switch' => '0',
                'output_jack' => '1/4" 2-Conductor',
                'case' => 'Ibanez® "Team J. Craft" form-fit Hardshell Case with plush Cranberry Interior',
                'strap_lock' => '1',
                'strings' => 'D\'Addario® EXL120 .009, .011, .016, .024, .032, .042 Gauges',
            'tools' => 'Factory accessories (sealed/unopened) Strap locks, Tremolo Arm, Truss Rod Wrench',
            'manual' => 'Ibanez® Japan (Multi-lingual) Owner’s Manual, Warranty Card and all Hang-tags',
                'coa' => '1',
                'other' => '0',
                'weight' => 's the actual weighed-value in US Standard Units',
                'disclosure' => 'Some technical specs above are taken from Ibanez® website / internet archives. The words  Ibanez® / Gotoh®/ DiMarzio® and the associated designs are registered trademarks of Hoshino  Gakki Co',
                'created_at' => '2022-05-18 07:42:07',
                'updated_at' => '2022-05-18 07:42:07',
            ),
            4 => 
            array (
                'id' => '5',
                'product_id' => '5',
                'description' => '-',
            'condition' => 'Near Mint (nearly unplayed)',
                'number_of_strings' => '6',
                'orientation' => 'Right-handed',
                'made_in' => 'Indonesia',
                'year' => '2016',
                'type' => 'Hollowbody Acoustic',
                'shape' => 'Square Shoulder Dreadnought',
                'material' => 'Front: 2-pc Solid Spruce Top,  Back & Rims: 2-pc Mahogany Laminate',
                'carve' => 'Front: Flat Top,  Back: Flat',
                'binding' => 'Front: 6-ply Black/White,  Back: 1-ply White',
                'weight_relief' => NULL,
                'build_material' => 'Titebond Glue',
                'body_finish_type' => 'Gloss Polyurethane',
                'color' => 'Front: Faded Cherry Sunburst,  Back & Neck: Transparent Red',
                'neck_material' => '1-pc Mahogany',
                'truss_rod' => 'Standard 2-way Adjustable',
                'truss_rod_cover' => '2-ply B/W Beveled Bell-style with Etched White “Hummingbird Pro” Print',
                'peghead_particular' => 'Front: Unbound, Gloss Black with White Acrylic Epiphone® Logo & Crown Inlays, Back: Inspection and “Made in Indonesia” Decals',
                'neck_profile' => 'Slim Taper "D" Profile',
                'fingerboard_material' => 'Pau Ferro',
                'crown_radius' => '12',
                'scale_length' => '24.72',
                'frets' => '20 Medium Jumbo',
                'nut_size' => '1.690" / PVC',
                'neck_width' => '1.670” at 1st fret / 2.100” at 12th fret / 2.260” at E.O.B',
                'neck_depth' => '0.840" at 1st fret / 0.900" at 12th fret',
                'inlays' => 'Pearloid Split Parallelograms',
                'neck_binding' => '1-ply White Binding',
                'side_dots' => 'Black Acrylic',
                'neck_joint' => 'Set Dovetail at 14th fret bonded with Hide Glue',
                'bridge' => 'White Hardened Plastic, Slotted, with Silver Dot Inlays',
                'tailpiece' => 'No',
                'tuning_machines' => 'Nickel Plated, Grover® Rotomatic™ / 14:1 ratio',
                'pickup_cover' => NULL,
                'strap_buttons' => 'Polished Aluminum End Pin at Neck Heel, Shadow™ ePerformer™ Output Jack on Rim',
                'pickguard' => '1-ply Faux Tortoise Hummingbird Shape with Hummingbird Graphics',
                'control_knobs' => NULL,
                'switch' => NULL,
                'bridge_pickup' => 'Epiphone-Shadow™ ePerformer™ Preamp System & NanoFlex Pickup',
                'middle_pickup' => '0',
                'neck_pickup' => NULL,
                'active_passive' => 'Active',
                'series_pararell' => NULL,
            'control' => 'Master Volume, Treble and Bass EQ, Mute, and a Dynamics (slider) Control',
                'mono_stereo' => NULL,
                'vol_pontentiometer' => NULL,
                'pontentiometer' => NULL,
                'capacitor' => NULL,
                'harnesst' => NULL,
                'push_pull' => '0',
                'piezo' => '0',
                'active_eq' => '1',
                'kill_switch' => '0',
                'output_jack' => 'ePerformer™ 1/4" 2-Conductor Mono',
                'case' => 'No Case by default, but we provide a new Custom-ordered Acoustic Guitar Case',
                'strap_lock' => '0',
                'strings' => 'Ernie Ball® Earthwood Phosphor Bronze Med Light Strings 12-54 Gauges',
                'tools' => 'No',
                'manual' => 'Epiphone® Guarantee Pamphlet',
                'coa' => '0',
                'other' => '1',
                'weight' => 'Is the actual weighed-value in US Standard Units',
                'disclosure' => 'Some technical specs above are taken from Epiphone® / Shadow™ ePerformer™ website and/or internet archives. The words Epiphone® / Grover® / Ernie Ball® and the associated designs are  registe',
                'created_at' => '2022-05-18 08:41:26',
                'updated_at' => '2022-05-18 08:41:26',
            ),
            5 => 
            array (
                'id' => '6',
                'product_id' => '6',
                'description' => '-',
            'condition' => 'New (NOS)',
                'number_of_strings' => '6',
                'orientation' => 'Right-handed',
                'made_in' => 'U.S.A',
                'year' => '2014',
                'type' => 'Solidbody',
                'shape' => 'Explorer / Offset',
                'material' => '2-pc Mahogany',
                'carve' => 'Front: Flat, Back: Flat',
                'binding' => 'Front: 7-ply B/W,  Back: Unbound',
                'weight_relief' => 'Un-chambered',
                'build_material' => 'Franklin Titebond 50 Glue',
                'body_finish_type' => 'High-gloss Nitrocellulose Lacquer',
                'color' => 'Front: Alpine White,  Back & Neck: Alpine White',
                'neck_material' => '1-pc Mahogany',
                'truss_rod' => '2-way Adjustable',
                'truss_rod_cover' => '1-ply White Bell Style with Hot-stamped ‘Lzzy Hale’ Signature',
                'peghead_particular' => 'Front: Unbound, Gloss Alpine White with Gold Silkscreen Gibson® Logo, Back: Wood-stamped Serial Number',
                'neck_profile' => 'Lzzy Hale Slim Taper ‘C’',
                'fingerboard_material' => 'Rosewood',
                'crown_radius' => '12',
                'scale_length' => '24.75',
                'frets' => '22 Medium Jumbo',
                'nut_size' => '1-11/16” / Tektoid',
                'neck_width' => '1.711” at 1st fret / 2.073” at 12th fret / 2.260” at E.O.B.',
                'neck_depth' => '0.800" at 1st fret / 0.940" at 12th fret',
                'inlays' => 'Acrylic ‘MOP’ Blocks',
                'neck_binding' => 'White',
                'side_dots' => 'Black',
                'neck_joint' => 'Mortise and Tenon, Franklin Titebond 50 Glue',
                'bridge' => 'Gold Plated, TonePros® locking Tune-O-Matic, Zamak',
                'tailpiece' => 'Gold Plated, Stop Bar, Zamak',
                'tuning_machines' => 'Gold Plated, Locking Mini Grover® with Pearloid Kidney Buttons, 18:01 Ratio',
                'pickup_cover' => 'Gold Plated, Humbucker, White Plastic Mounting Seats covered with Gold Dress Rings',
            'strap_buttons' => 'Gold Plated, Aluminum End Pins (Schaller® Strap Locks included in case)',
                'pickguard' => 'Gold Plexi Single-ply Explorer Style – short bevel',
            'control_knobs' => 'Gold/MOP Cap U.F.O. Style Knobs and no Dial-Pointers (original plastic Knobs in case)',
                'switch' => 'White Plastic Tip / No Washer',
                'bridge_pickup' => 'Gold Plated, \'57 Classic Plus, Alnico II, DCR 13.8k',
                'middle_pickup' => '0',
                'neck_pickup' => 'Gold Plated, \'57 Classic, Alnico II, DCR 8.5k',
                'active_passive' => 'Passive',
                'series_pararell' => 'Series',
                'control' => '2 Volume, 1 Tone, Switchcraft™ 3-position Pickup Toggle Switch',
                'mono_stereo' => NULL,
                'vol_pontentiometer' => '500k Linear AT',
                'pontentiometer' => '500k Linear AT',
                'capacitor' => '022uF – 20% values',
                'harnesst' => 'Standard Config. Gibson® Explorer Wiring',
                'push_pull' => '0',
                'piezo' => '0',
                'active_eq' => '0',
                'kill_switch' => '0',
                'output_jack' => 'Switchcraft™ 1/4" 2-Conductor',
                'case' => 'Gibson® U.S.A. Explorer Hardshell Historic Brown with dark pink interior & lock-hasp',
                'strap_lock' => '1',
                'strings' => 'Elixir® Polyweb .009, .011, .016, .026, .036, .046 Gauges',
                'tools' => 'Gibson® U.S.A. Truss Rod Wrench',
                'manual' => 'Gibson® U.S.A. Owner’s Manual, Gold Warranty and Pre-ship Factory Checklist',
                'coa' => '0',
                'other' => '1',
                'weight' => 'Is the actual weighed-value in US Standard Units',
                'disclosure' => 'Some technical Specs may have been extracted from Gibson® U.S.A. and/or internet archives.  The words Gibson® / Grover® / Schaller® / Switchcraft™ / TonePros® and the associated designs  are ',
                'created_at' => '2022-05-18 09:05:50',
                'updated_at' => '2022-05-18 09:05:50',
            ),
            6 => 
            array (
                'id' => '7',
                'product_id' => '7',
                'description' => '-',
            'condition' => 'New (NOS)',
                'number_of_strings' => '6',
                'orientation' => 'Right-handed',
                'made_in' => 'U.S.A',
                'year' => '2015',
                'type' => 'Hollowbody Acoustic',
                'shape' => 'Venetian Cutaway Grand Auditorium, 16” wide | 20" long | 4−5/8" depth',
                'material' => 'Front: 1-pc Solid Sitka Spruce,  Back: 2-pc Poplar/Koa Layered,  Rims: Poplar/Koa',
                'carve' => 'Front: Flat,  Back: Flat with no Wedge',
                'binding' => 'Front: 1-ply Cream Back: 1-ply Cream',
                'weight_relief' => NULL,
                'build_material' => 'Taylor® Proprietary Premium Tonewood Glue',
                'body_finish_type' => 'Taylor® Gloss 6.0 Lacquer',
                'color' => 'Front: Natural Gloss,  Back: Natural Gloss Neck: Natural Satin',
                'neck_material' => 'Sapele',
                'truss_rod' => 'Standard 2-way Adjustable',
                'truss_rod_cover' => 'Single-ply ‘Arrow’ Indian Rosewood',
                'peghead_particular' => 'Front: Unbound, Satin Finish, Indian Rosewood Overlay with White Taylor® ‘Colorcore’, Back: Satin Finish Natural Mahogany',
                'neck_profile' => 'Round',
                'fingerboard_material' => 'West African Crelicam Ebony',
                'crown_radius' => '12',
                'scale_length' => '25-1/2',
                'frets' => '20 Medium Jumbo',
                'nut_size' => '1-11/16" / Tusq',
                'neck_width' => '1.680” at 1st fret / 2.070” at 12th fret / 2.250” at E.O.B',
                'neck_depth' => '0.820" at 1st fret / 0.870" at 12th fret',
                'inlays' => 'Italian Acrylic Small Diamonds',
                'neck_binding' => 'No',
                'side_dots' => 'White Acrylic',
            'neck_joint' => 'Taylor® Set-neck (Glued Dovetail)',
                'bridge' => 'Tusq Saddle on Ebony Base with no Inlays | 2−7/32"string spacing at saddle',
                'tailpiece' => 'No',
                'tuning_machines' => 'Taylor® Die-Cast Chrome 200-Series Deluxe with Chrome Plated Buttons / 15:1 Ratio',
                'pickup_cover' => NULL,
            'strap_buttons' => '1 Black Aluminum End Pin (at Neck Heel) and 1 LR Baggs® Aged Brass (output jack)',
                'pickguard' => 'Single-ply Faux Tortoise',
                'control_knobs' => NULL,
                'switch' => NULL,
            'bridge_pickup' => 'Taylor® Expression System® 2 (ES2)',
                'middle_pickup' => '0',
                'neck_pickup' => NULL,
                'active_passive' => 'Active',
                'series_pararell' => NULL,
                'control' => '1 Volume and 2 Tone Controls',
                'mono_stereo' => NULL,
                'vol_pontentiometer' => NULL,
                'pontentiometer' => NULL,
                'capacitor' => NULL,
                'harnesst' => NULL,
                'push_pull' => '0',
                'piezo' => '0',
                'active_eq' => '1',
                'kill_switch' => '0',
                'output_jack' => 'Taylor® 1/4" 2-Conductor Mono',
                'case' => 'Taylor® Deluxe Hardshell Case, Black with Maroon Crushed Velvet Interior',
                'strap_lock' => '0',
                'strings' => 'Elixir® 16027 Nanoweb Phosphor Bronze Acoustic .011-.052 Gauges',
                'tools' => 'No',
                'manual' => 'Taylor® Owner’s Manual, Factory Checklist',
                'coa' => '0',
                'other' => '1',
                'weight' => 'Is the actual weighed-value in US Standard Units',
                'disclosure' => 'Some technical specs above are taken from Gibson® / LR Baggs® website / internet archives. The  words Gibson® / LR Baggs® / Elixir® and the associated designs are registered trademarks of  Gi',
                'created_at' => '2022-05-19 06:49:20',
                'updated_at' => '2022-05-19 06:49:20',
            ),
        ));
        
        
    }
}