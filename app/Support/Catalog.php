<?php

namespace App\Support;

/**
 * Demo catalog used by the design mockup pages.
 *
 * This is intentionally static: the visual direction stage has no database yet,
 * so every page reads the same realistic Bangladeshi product data from here.
 * Replace with Eloquent models when the implementation phase starts.
 */
class Catalog
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public static function products(): array
    {
        return [
            [
                'slug' => 'premium-cotton-t-shirt',
                'name' => 'Premium Cotton T-Shirt',
                'brand' => 'BitMart Basics',
                'category' => "Men's Fashion",
                'price' => 890,
                'originalPrice' => 1200,
                'rating' => 4.6,
                'reviews' => 312,
                'icon' => 'shirt',
                'tint' => 'primary',
                'badge' => 'Bestseller',
                'stock' => 7,
                'sku' => 'BM-MTS-1001',
                'short' => 'Breathable 100% combed cotton tee with a regular fit.',
                'description' => 'A everyday essential built from 100% combed cotton with a slightly thicker weave that keeps its shape after washing. The regular fit sits clean without being tight, and the pre-shrunk collar keeps the neckline in place season after season.',
                'highlights' => [
                    '100% combed cotton, 180 GSM',
                    'Regular fit with ribbed collar',
                    'Pre-shrunk — true to size after wash',
                    'Side-seamed with shoulder-to-shoulder tape',
                ],
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'colors' => ['White', 'Navy', 'Charcoal'],
                'deliveryDays' => '1–3 days',
                'delivery' => 'Delivery in Dhaka 1–3 days',
                'cod' => true,
                'ratingBreakdown' => [5 => 62, 4 => 24, 3 => 8, 2 => 3, 1 => 3],
                'specs' => [
                    ['Material', '100% combed cotton'],
                    ['Weight', '180 GSM'],
                    ['Fit', 'Regular'],
                    ['Sleeve', 'Half sleeve'],
                    ['Collar', 'Ribbed crew neck'],
                    ['Care', 'Machine wash cold, do not bleach'],
                    ['Origin', 'Made in Bangladesh'],
                ],
                'reviewsList' => [
                    ['name' => 'Rakib H.', 'rating' => 5, 'date' => '12 Oct 2026', 'title' => 'Exactly as described', 'body' => 'Fabric is thicker than I expected for the price. Washed it three times already, no shrinking. Fits true to size if you take your usual size.'],
                    ['name' => 'Tanvir M.', 'rating' => 4, 'date' => '28 Sep 2026', 'title' => 'Good quality, slightly long', 'body' => 'Quality is genuinely good and the colour is accurate. It is a bit long on me, so I would size down if you are shorter than 5\'6".'],
                    ['name' => 'Sabbir A.', 'rating' => 5, 'date' => '9 Sep 2026', 'title' => 'Ordered two more', 'body' => 'Delivery took two days to Chattogram. Stitching is neat inside and outside, which is rare at this price.'],
                ],
            ],
            [
                'slug' => 'womens-kurti',
                'name' => "Women's Kurti",
                'brand' => 'BitMart Basics',
                'category' => "Women's Fashion",
                'price' => 1490,
                'originalPrice' => 1900,
                'rating' => 4.7,
                'reviews' => 264,
                'icon' => 'gem',
                'tint' => 'secondary',
                'badge' => null,
                'stock' => 24,
                'sku' => 'BM-WKT-2044',
                'short' => 'Premium cotton blend kurti with hand-finished embroidery.',
                'description' => 'A long kurti cut from a soft cotton blend that moves easily, finished with light hand embroidery across the yoke. Worn with a matching pajama or jeans, it works for everyday wear, family visits and casual gatherings.',
                'highlights' => [
                    'Cotton blend with a soft drape',
                    'Hand-finished embroidery on the yoke',
                    '3.4 metre length with side slits',
                    'Matching pajama set available separately',
                ],
                'sizes' => ['M', 'L', 'XL', 'XXL'],
                'colors' => ['Maroon', 'Teal', 'Black'],
                'deliveryDays' => '2–4 days',
                'delivery' => 'Delivery in Dhaka 2–4 days',
                'cod' => true,
                'ratingBreakdown' => [5 => 71, 4 => 18, 3 => 6, 2 => 3, 1 => 2],
                'specs' => [
                    ['Material', 'Cotton blend'],
                    ['Length', '3.4 metre'],
                    ['Fit', 'Straight'],
                    ['Sleeve', 'Three-quarter'],
                    ['Care', 'Hand wash separately first time'],
                    ['Origin', 'Made in Bangladesh'],
                ],
                'reviewsList' => [
                    ['name' => 'Sumaiya A.', 'rating' => 5, 'date' => '15 Oct 2026', 'title' => 'Beautiful stitching', 'body' => 'The embroidery is neater than the photos. Wore it for a family gathering and got asked where I bought it.'],
                    ['name' => 'Nusrat J.', 'rating' => 5, 'date' => '2 Oct 2026', 'title' => 'Comfortable for long days', 'body' => 'Soft fabric, no itch at all. Wore it for six hours straight at a wedding.'],
                    ['name' => 'Farhana K.', 'rating' => 4, 'date' => '20 Sep 2026', 'title' => 'Nice, runs slightly long', 'body' => 'Quality is good and the colour matches. I am 5\'3" and had to get it altered a little.'],
                ],
            ],
            [
                'slug' => 'casual-sneakers',
                'name' => 'Casual Sneakers',
                'brand' => 'BitMart Footwear',
                'category' => 'Footwear',
                'price' => 2350,
                'originalPrice' => 2800,
                'rating' => 4.5,
                'reviews' => 421,
                'icon' => 'footprints',
                'tint' => 'info',
                'badge' => 'Popular',
                'stock' => 16,
                'sku' => 'BM-CSN-3310',
                'short' => 'Lightweight casual sneakers with a cushioned insole.',
                'description' => 'Everyday sneakers built on a flexible rubber outsole with a soft foam insole. The upper is breathable knit, so it stays comfortable through long days and humid weather. A padded collar and heel counter add support without bulk.',
                'highlights' => [
                    'Breathable knit upper',
                    'Cushioned foam insole',
                    'Flexible rubber outsole with grip pattern',
                    'Padded collar and heel counter',
                ],
                'sizes' => ['40', '41', '42', '43', '44'],
                'colors' => ['White', 'Grey', 'Navy'],
                'deliveryDays' => '2–4 days',
                'delivery' => 'Delivery in Dhaka 2–4 days',
                'cod' => true,
                'ratingBreakdown' => [5 => 54, 4 => 28, 3 => 10, 2 => 5, 1 => 3],
                'specs' => [
                    ['Upper', 'Breathable knit'],
                    ['Sole', 'Rubber with cushioning'],
                    ['Closure', 'Lace-up'],
                    ['Heel', 'Flat'],
                    ['Care', 'Wipe with a damp cloth'],
                    ['Origin', 'Made in Bangladesh'],
                ],
                'reviewsList' => [
                    ['name' => 'Imran H.', 'rating' => 5, 'date' => '11 Oct 2026', 'title' => 'Great for daily wear', 'body' => 'I wear these for office and travel. Light enough for long walks and they look clean with everything.'],
                    ['name' => 'Mehedi S.', 'rating' => 4, 'date' => '30 Sep 2026', 'title' => 'Size runs a bit large', 'body' => 'Comfortable and the sole is grippy. Consider sizing down if you are between sizes.'],
                    ['name' => 'Arif T.', 'rating' => 5, 'date' => '18 Sep 2026', 'title' => 'Second pair bought', 'body' => 'Bought one, liked it, bought another for my brother. Delivery took three days to Sylhet.'],
                ],
            ],
            [
                'slug' => 'mens-casual-shirt',
                'name' => "Men's Casual Shirt",
                'brand' => 'BitMart Basics',
                'category' => "Men's Fashion",
                'price' => 1290,
                'originalPrice' => null,
                'rating' => 4.4,
                'reviews' => 188,
                'icon' => 'shirt',
                'tint' => 'info',
                'badge' => null,
                'stock' => 41,
                'sku' => 'BM-MCS-1420',
                'short' => 'Soft cotton casual shirt for everyday and office wear.',
                'description' => 'A relaxed everyday shirt in a breathable cotton blend that works for office days and casual evenings. The semi-straight cut leaves room to move, and the hidden button-down collar stays neat without feeling stiff.',
                'highlights' => [
                    'Breathable cotton blend',
                    'Hidden button-down collar',
                    'Semi-straight regular fit',
                    'Single chest pocket',
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => ['Sky Blue', 'White', 'Graphite'],
                'deliveryDays' => '1–3 days',
                'delivery' => 'Delivery in Dhaka 1–3 days',
                'cod' => true,
                'ratingBreakdown' => [5 => 48, 4 => 30, 3 => 12, 2 => 6, 1 => 4],
                'specs' => [
                    ['Material', 'Cotton blend'],
                    ['Fit', 'Semi-straight'],
                    ['Collar', 'Hidden button-down'],
                    ['Sleeve', 'Full sleeve with cuff'],
                    ['Care', 'Machine wash warm'],
                    ['Origin', 'Made in Bangladesh'],
                ],
                'reviewsList' => [
                    ['name' => 'Fahim R.', 'rating' => 4, 'date' => '8 Oct 2026', 'title' => 'Good for office', 'body' => 'Wears well for office in our humid weather. Sleeve is a touch long but the cuff buttons fix it.'],
                    ['name' => 'Riyad A.', 'rating' => 5, 'date' => '22 Sep 2026', 'title' => 'Soft fabric', 'body' => 'Really comfortable and it does not wrinkle much. Colour matches the listing.'],
                    ['name' => 'Sohel D.', 'rating' => 4, 'date' => '4 Sep 2026', 'title' => 'Solid value', 'body' => 'Good shirt for the price. Button quality is better than I expected.'],
                ],
            ],
            [
                'slug' => 'panjabi',
                'name' => 'Panjabi',
                'brand' => 'BitMart Traditional',
                'category' => 'Panjabi & Kurta',
                'price' => 1850,
                'originalPrice' => 2100,
                'rating' => 4.8,
                'reviews' => 156,
                'icon' => 'shirt',
                'tint' => 'secondary',
                'badge' => 'Eid favourite',
                'stock' => 12,
                'sku' => 'BM-PNJ-2210',
                'short' => 'Classic panjabi in fine cotton with tonal embroidery.',
                'description' => 'A classic panjabi in fine cotton with tonal embroidery on the chest panel. The fit is regular with a full-length placket and wooden buttons, and the fabric has a soft sheen that works for Eid, weddings and formal family events.',
                'highlights' => [
                    'Fine cotton with tonal embroidery',
                    'Wooden buttons and full-length placket',
                    'Regular fit, long length',
                    'Side vents for easy movement',
                ],
                'sizes' => ['M', 'L', 'XL', 'XXL'],
                'colors' => ['Off White', 'Charcoal', 'Olive'],
                'deliveryDays' => '2–4 days',
                'delivery' => 'Delivery in Dhaka 2–4 days',
                'cod' => true,
                'ratingBreakdown' => [5 => 76, 4 => 16, 3 => 5, 2 => 2, 1 => 1],
                'specs' => [
                    ['Material', 'Fine cotton'],
                    ['Fit', 'Regular'],
                    ['Length', 'Full length'],
                    ['Collar', 'Band collar'],
                    ['Care', 'Dry clean recommended'],
                    ['Origin', 'Made in Bangladesh'],
                ],
                'reviewsList' => [
                    ['name' => 'Jahid M.', 'rating' => 5, 'date' => '16 Oct 2026', 'title' => 'Perfect for Eid', 'body' => 'Wore it for Eid and got a lot of compliments. The embroidery is neat and the buttons feel solid.'],
                    ['name' => 'Rubel A.', 'rating' => 5, 'date' => '3 Oct 2026', 'title' => 'Better than the mall', 'body' => 'Quality is close to what you get in Dhanmondi for a fraction of the price.'],
                    ['name' => 'Kamal U.', 'rating' => 4, 'date' => '26 Sep 2026', 'title' => 'Long, as expected', 'body' => 'Standard panjabi length. Wore it with pyjama and it looked right. Delivery was on time.'],
                ],
            ],
            [
                'slug' => 'classic-oxford-shoe',
                'name' => 'Classic Oxford Shoe',
                'brand' => 'BitMart Footwear',
                'category' => 'Footwear',
                'price' => 3150,
                'originalPrice' => 3600,
                'rating' => 4.4,
                'reviews' => 98,
                'icon' => 'footprints',
                'tint' => 'neutral',
                'badge' => null,
                'stock' => 9,
                'sku' => 'BM-OXF-4500',
                'short' => 'Formal leather oxford with a comfortable insole.',
                'description' => 'A formal oxford built on a goodyear-welted sole with a genuine leather upper and a padded insole for long days. The closed lacing keeps the shape clean, making it an easy match for office and formal wear.',
                'highlights' => [
                    'Genuine leather upper',
                    'Goodyear-welted rubber sole',
                    'Padded leather insole',
                    'Closed lacing, round toe',
                ],
                'sizes' => ['40', '41', '42', '43', '44'],
                'colors' => ['Black', 'Brown'],
                'deliveryDays' => '2–5 days',
                'delivery' => 'Delivery in Dhaka 2–5 days',
                'cod' => true,
                'ratingBreakdown' => [5 => 51, 4 => 27, 3 => 12, 2 => 6, 1 => 4],
                'specs' => [
                    ['Upper', 'Genuine leather'],
                    ['Sole', 'Goodyear-welted rubber'],
                    ['Closure', 'Lace-up'],
                    ['Toe', 'Round'],
                    ['Care', 'Use shoe polish'],
                    ['Origin', 'Made in Bangladesh'],
                ],
                'reviewsList' => [
                    ['name' => 'Sabbir F.', 'rating' => 5, 'date' => '13 Oct 2026', 'title' => 'Office pair that lasts', 'body' => 'Leather is soft and needed almost no breaking in. Sole is stitched well.'],
                    ['name' => 'Zayan A.', 'rating' => 4, 'date' => '27 Sep 2026', 'title' => 'Good leather', 'body' => 'Real leather, not synthetic. Slightly stiff for the first week, then perfect.'],
                    ['name' => 'Nayeem R.', 'rating' => 4, 'date' => '11 Sep 2026', 'title' => 'Nice finish', 'body' => 'The polish and stitching look premium. Took five days to arrive but that was stated upfront.'],
                ],
            ],
            [
                'slug' => 'canvas-backpack',
                'name' => 'Canvas Backpack',
                'brand' => 'BitMart Essentials',
                'category' => 'Accessories',
                'price' => 1650,
                'originalPrice' => 1900,
                'rating' => 4.3,
                'reviews' => 97,
                'icon' => 'bag',
                'tint' => 'primary',
                'badge' => null,
                'stock' => 18,
                'sku' => 'BM-CBP-5100',
                'short' => 'Water-resistant canvas backpack with a padded laptop sleeve.',
                'description' => 'A daily backpack in heavy 16 oz canvas with a water-resistant coating, a padded 15" laptop sleeve and padded shoulder straps. It holds daily essentials comfortably without looking bulky.',
                'highlights' => [
                    'Heavy 16 oz water-resistant canvas',
                    'Padded 15" laptop sleeve',
                    'Padded adjustable shoulder straps',
                    'Hidden back pocket for valuables',
                ],
                'sizes' => ['One size'],
                'colors' => ['Olive', 'Charcoal', 'Sand'],
                'deliveryDays' => '2–4 days',
                'delivery' => 'Delivery in Dhaka 2–4 days',
                'cod' => true,
                'ratingBreakdown' => [5 => 44, 4 => 30, 3 => 14, 2 => 7, 1 => 5],
                'specs' => [
                    ['Material', '16 oz canvas'],
                    ['Capacity', '22 litre'],
                    ['Laptop sleeve', 'Fits up to 15 inch'],
                    ['Straps', 'Padded, adjustable'],
                    ['Care', 'Spot clean'],
                    ['Origin', 'Made in Bangladesh'],
                ],
                'reviewsList' => [
                    ['name' => 'Nayeem R.', 'rating' => 4, 'date' => '10 Oct 2026', 'title' => 'Sturdy for daily use', 'body' => 'Carries my laptop and books without strain. Canvas feels thick and the stitching is solid.'],
                    ['name' => 'Sumaiya A.', 'rating' => 4, 'date' => '1 Oct 2026', 'title' => 'Good size', 'body' => 'Fits my 14 inch laptop with room for a notebook. Straps are comfortable.'],
                    ['name' => 'Rafiq H.', 'rating' => 5, 'date' => '19 Sep 2026', 'title' => 'Survives rain', 'body' => 'Light drizzle did not soak through. Very happy with the quality for this price.'],
                ],
            ],
            [
                'slug' => 'sports-watch',
                'name' => 'Sports Watch',
                'brand' => 'BitMart Essentials',
                'category' => 'Accessories',
                'price' => 2950,
                'originalPrice' => 3400,
                'rating' => 4.2,
                'reviews' => 74,
                'icon' => 'watch',
                'tint' => 'neutral',
                'badge' => null,
                'stock' => 14,
                'sku' => 'BM-SWT-7200',
                'short' => 'Everyday digital watch with a silicone strap and water resistance.',
                'description' => 'A clean everyday digital watch with a durable silicone strap, a backlit display and a date window. It is water resistant for daily splashes, so it is easy to wear for workouts, office and everyday use.',
                'highlights' => [
                    'Digital LED display with backlight',
                    'Soft silicone strap, quick release',
                    'Date and day display',
                    'Water resistant for daily use',
                ],
                'sizes' => ['One size'],
                'colors' => ['Black', 'Navy', 'Olive'],
                'deliveryDays' => '2–4 days',
                'delivery' => 'Delivery in Dhaka 2–4 days',
                'cod' => true,
                'ratingBreakdown' => [5 => 39, 4 => 29, 3 => 18, 2 => 8, 1 => 6],
                'specs' => [
                    ['Display', 'Digital LED'],
                    ['Strap', 'Silicone'],
                    ['Water resistance', 'Daily splashes'],
                    ['Battery', 'Replaceable cell'],
                    ['Case', 'Alloy'],
                    ['Origin', 'Made in Bangladesh'],
                ],
                'reviewsList' => [
                    ['name' => 'Sohel D.', 'rating' => 4, 'date' => '6 Oct 2026', 'title' => 'Good value', 'body' => 'Display is bright and the strap is comfortable. Buttons are a bit stiff at first but fine after a week.'],
                    ['name' => 'Asif R.', 'rating' => 4, 'date' => '14 Sep 2026', 'title' => 'Simple and reliable', 'body' => 'Does exactly what it says. Battery lasts about a year on a standard cell.'],
                    ['name' => 'Mizan K.', 'rating' => 4, 'date' => '2 Sep 2026', 'title' => 'Nice look for the price', 'body' => 'Looks more expensive than it is. Strap colour matches the photos exactly.'],
                ],
            ],
        ];
    }

    /**
     * @return array<string, mixed>|null
     */
    public static function find(string $slug): ?array
    {
        foreach (self::products() as $product) {
            if ($product['slug'] === $slug) {
                return $product;
            }
        }

        return null;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public static function related(string $slug, int $limit = 5): array
    {
        $related = array_values(array_filter(
            self::products(),
            fn (array $product): bool => $product['slug'] !== $slug,
        ));

        return array_slice($related, 0, $limit);
    }

    /**
     * Demo cart lines. Each line references a catalog product by slug.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function cart(): array
    {
        $lines = [
            ['slug' => 'premium-cotton-t-shirt', 'quantity' => 2, 'size' => 'M', 'color' => 'Navy'],
            ['slug' => 'womens-kurti', 'quantity' => 1, 'size' => 'L', 'color' => 'Maroon'],
            ['slug' => 'casual-sneakers', 'quantity' => 1, 'size' => '42', 'color' => 'White'],
        ];

        return array_map(function (array $line): array {
            $product = self::find($line['slug']);

            return [
                'slug' => $line['slug'],
                'name' => $product['name'],
                'price' => $product['price'],
                'originalPrice' => $product['originalPrice'],
                'icon' => $product['icon'],
                'tint' => $product['tint'],
                'quantity' => $line['quantity'],
                'size' => $line['size'],
                'color' => $line['color'],
                'lineTotal' => $product['price'] * $line['quantity'],
            ];
        }, $lines);
    }

    /**
     * @return array<string, int>
     */
    public static function summary(array $lines): array
    {
        $subtotal = array_sum(array_column($lines, 'lineTotal'));
        $delivery = $subtotal >= 2000 ? 0 : 60;

        return [
            'subtotal' => $subtotal,
            'delivery' => $delivery,
            'discount' => 0,
            'total' => $subtotal + $delivery,
        ];
    }

    /**
     * @return array<int, string>
     */
    public static function districts(): array
    {
        return [
            'Dhaka', 'Chattogram', 'Khulna', 'Rajshahi', 'Sylhet', 'Barishal', 'Rangpur', 'Mymensingh', 'Cumilla', 'Narayanganj',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public static function order(): array
    {
        $lines = self::cart();
        $summary = self::summary($lines);

        return [
            'number' => 'BM-2026-018427',
            'placedAt' => '21 October 2026, 10:42 AM',
            'eta' => '24–26 October 2026',
            'paymentMethod' => 'bKash',
            'paymentStatus' => 'Paid',
            'address' => [
                'name' => 'Arif Hossain',
                'phone' => '01712 345 678',
                'line' => 'House 42, Road 7, Dhanmondi',
                'area' => 'Dhanmondi, Dhaka 1209',
            ],
            'lines' => $lines,
            'summary' => $summary,
            'status' => 'Packed',
            'timeline' => [
                ['label' => 'Order placed', 'at' => '21 Oct, 10:42 AM', 'done' => true],
                ['label' => 'Payment received', 'at' => '21 Oct, 10:43 AM', 'done' => true],
                ['label' => 'Packed for delivery', 'at' => '21 Oct, 2:10 PM', 'done' => true],
                ['label' => 'Shipped', 'at' => 'Expected 23 Oct', 'done' => false],
                ['label' => 'Delivered', 'at' => 'Expected 24–26 Oct', 'done' => false],
            ],
        ];
    }
}
