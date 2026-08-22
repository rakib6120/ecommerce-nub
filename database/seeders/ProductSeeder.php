<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Classic Cotton T-Shirt',
                'category' => 'Men\'s Clothing',
                'price' => 14.99,
                'stock' => 50,
                'short_description' => 'Soft, breathable everyday cotton tee in a relaxed fit.',
                'description' => "Made from 100% combed cotton for a soft handfeel that holds its shape wash after wash. The relaxed, true-to-size fit works equally well on its own or layered under a jacket.\n\nAvailable in classic colors with reinforced stitching at the seams for everyday durability. Machine washable.",
                'image_url' => 'https://images.rawpixel.com/editor_1024/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIzLTA0L2JzMTY2LWltYWdlLmpwZw.jpg',
            ],
            [
                'name' => 'Slim Fit Denim Jeans',
                'category' => 'Men\'s Clothing',
                'price' => 39.99,
                'stock' => 30,
                'short_description' => 'Stretch denim jeans with a modern slim fit.',
                'description' => "A modern slim-fit jean cut from stretch denim that moves with you without losing its shape. Mid-rise waist, tapered leg, and a classic five-pocket design make it easy to dress up or down.\n\nReinforced belt loops and a durable zip fly for everyday wear.",
                'image_url' => 'https://live.staticflickr.com/7187/6791754240_7abb2c4783.jpg',
            ],
            [
                'name' => 'Floral Summer Dress',
                'category' => 'Women\'s Clothing',
                'price' => 29.99,
                'stock' => 25,
                'short_description' => 'Lightweight floral dress, perfect for warm days.',
                'description' => "A flowy, lightweight dress in a floral print designed to keep you cool on warm days. Adjustable straps and a flattering A-line cut make it easy to wear from daytime errands to evening plans.\n\nBreathable fabric with a soft, comfortable finish.",
                'image_url' => 'https://live.staticflickr.com/8564/16585656836_bdcc290abf.jpg',
            ],
            [
                'name' => 'High-Waist Leggings',
                'category' => 'Women\'s Clothing',
                'price' => 19.99,
                'stock' => 40,
                'short_description' => 'Squat-proof high-waist leggings for workouts or everyday wear.',
                'description' => "Four-way stretch fabric moves with you through any workout while the high-waist design offers secure, comfortable coverage. Opaque, squat-proof material with a hidden waistband pocket for small essentials.\n\nSuitable for the gym, yoga, or everyday wear.",
                'image_url' => 'https://live.staticflickr.com/65535/49062484071_cb9708bfb7.jpg',
            ],
            [
                'name' => 'Wireless Bluetooth Earbuds',
                'category' => 'Electronics',
                'price' => 49.99,
                'stock' => 60,
                'short_description' => 'True wireless earbuds with rich sound and long battery life.',
                'description' => "True wireless earbuds delivering clear, balanced sound with deep bass. Bluetooth 5.0 provides a stable connection up to 10 meters, and the compact charging case adds several extra charges on the go.\n\nTouch controls for play/pause, skip, and calls. Sweat resistant, so they're ready for workouts too.",
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/ActiveSound_wireless_earbuds_by_Hykker_%28POJM200483%29.jpg/960px-ActiveSound_wireless_earbuds_by_Hykker_%28POJM200483%29.jpg',
            ],
            [
                'name' => 'Smart Fitness Watch',
                'category' => 'Electronics',
                'price' => 79.99,
                'stock' => 20,
                'short_description' => 'Track workouts, heart rate, and notifications on your wrist.',
                'description' => "Track steps, heart rate, sleep, and workouts right from your wrist, with smartphone notifications so you never miss a call or message. The bright touchscreen display is easy to read indoors and out.\n\nUp to 7 days of battery life on a single charge, with a water-resistant build for daily wear.",
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/LenovoWatch.jpg/960px-LenovoWatch.jpg',
            ],
            [
                'name' => 'Portable Power Bank 10000mAh',
                'category' => 'Electronics',
                'price' => 24.99,
                'stock' => 45,
                'short_description' => 'Compact 10000mAh power bank for charging on the go.',
                'description' => "A compact 10000mAh power bank that fits easily in a bag or pocket, enough to fully recharge most phones two to three times. Dual USB output lets you charge two devices at once.\n\nBuilt-in safeguards protect against overcharging and short circuits.",
                'image_url' => 'https://live.staticflickr.com/65535/49237499051_0b278fcdcd.jpg',
            ],
            [
                'name' => 'Ceramic Coffee Mug Set',
                'category' => 'Home & Living',
                'price' => 17.99,
                'stock' => 35,
                'short_description' => 'Set of 4 durable ceramic mugs for coffee or tea.',
                'description' => "A set of four ceramic mugs with a comfortable handle and a generous 12oz capacity, ideal for coffee, tea, or hot chocolate. Simple, clean design that fits any kitchen style.\n\nMicrowave and dishwasher safe for easy everyday use.",
                'image_url' => 'https://live.staticflickr.com/3179/2569795007_8613c017e2_b.jpg',
            ],
            [
                'name' => 'Scented Soy Candle',
                'category' => 'Home & Living',
                'price' => 12.99,
                'stock' => 55,
                'short_description' => 'Long-burning soy candle with a warm, cozy scent.',
                'description' => "Hand-poured from natural soy wax with a clean, long-lasting burn of up to 40 hours. The warm, inviting scent fills a room without being overpowering.\n\nComes in a travel-friendly tin that looks great on a shelf even after the candle is gone.",
                'image_url' => 'https://live.staticflickr.com/7247/8169721665_ca32134809_b.jpg',
            ],
            [
                'name' => 'Cozy Throw Blanket',
                'category' => 'Home & Living',
                'price' => 22.99,
                'stock' => 15,
                'short_description' => 'Soft, plush throw blanket for the couch or bed.',
                'description' => "An ultra-soft, plush throw blanket that's perfect for curling up on the couch or adding an extra layer to the bed. Lightweight yet warm, with a fuzzy texture on both sides.\n\nMachine washable and resistant to pilling with regular use.",
                'image_url' => 'https://live.staticflickr.com/3931/15448104852_d70d9a0bd4_b.jpg',
            ],
        ];

        foreach ($products as $product) {
            $category = Category::where('name', $product['category'])->first();
            $slug = Str::slug($product['name']);

            Product::create([
                'category_id' => $category->id,
                'name' => $product['name'],
                'slug' => $slug,
                'short_description' => $product['short_description'],
                'description' => $product['description'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'status' => true,
                'image' => $this->fetchProductImage($slug, $product['name'], $product['category'], $product['image_url']),
            ]);
        }
    }

    /**
     * Download a real, hand-picked product photo and normalize it into a
     * consistent square JPEG thumbnail. Falls back to a locally generated
     * placeholder card if the download fails, so seeding never depends on
     * network access being available.
     */
    private function fetchProductImage(string $slug, string $name, string $category, string $url): string
    {
        try {
            $response = Http::timeout(15)
                ->withHeaders(['User-Agent' => 'ShopNub-Demo/1.0 (university project; seed data)'])
                ->get($url);

            if (! $response->successful()) {
                return $this->generatePlaceholderImage($slug, $name, $category);
            }

            $source = @imagecreatefromstring($response->body());

            if (! $source) {
                return $this->generatePlaceholderImage($slug, $name, $category);
            }

            $square = $this->cropToSquare($source);
            imagedestroy($source);

            $path = 'products/'.$slug.'.jpg';
            ob_start();
            imagejpeg($square, null, 85);
            $contents = ob_get_clean();
            imagedestroy($square);

            Storage::disk('public')->put($path, $contents);

            return $path;
        } catch (\Throwable $e) {
            return $this->generatePlaceholderImage($slug, $name, $category);
        }
    }

    /**
     * Center-crop an image to a square and resize it to a consistent
     * 600x600 thumbnail, regardless of the source image's dimensions.
     *
     * @return \GdImage
     */
    private function cropToSquare($source)
    {
        $width = imagesx($source);
        $height = imagesy($source);
        $side = min($width, $height);
        $srcX = (int) (($width - $side) / 2);
        $srcY = (int) (($height - $side) / 2);

        $size = 600;
        $square = imagecreatetruecolor($size, $size);
        imagecopyresampled($square, $source, 0, 0, $srcX, $srcY, $size, $size, $side, $side);

        return $square;
    }

    /**
     * Generate a clean, on-brand placeholder product photo locally (no
     * network calls). Used only as a fallback when the real product photo
     * can't be downloaded.
     */
    private function generatePlaceholderImage(string $slug, string $name, string $category): string
    {
        $size = 600;
        $image = imagecreatetruecolor($size, $size);

        $background = imagecolorallocate($image, 243, 244, 246); // gray-100
        $accent = imagecolorallocate($image, 79, 70, 229); // indigo-600
        $accentText = imagecolorallocate($image, 255, 255, 255);
        $titleColor = imagecolorallocate($image, 17, 24, 39); // gray-900
        $categoryColor = imagecolorallocate($image, 79, 70, 229); // indigo-600

        imagefill($image, 0, 0, $background);

        $regularFont = resource_path('fonts/DejaVuSans.ttf');
        $boldFont = resource_path('fonts/DejaVuSans-Bold.ttf');

        // Monogram badge.
        $radius = 90;
        $cx = $size / 2;
        $cy = 250;
        imagefilledellipse($image, (int) $cx, (int) $cy, $radius * 2, $radius * 2, $accent);

        $letter = strtoupper(substr($name, 0, 1));
        $this->centerText($image, $boldFont, 48, $letter, $accentText, $cx, $cy);

        // Category label.
        $this->centerText($image, $regularFont, 16, strtoupper($category), $categoryColor, $cx, 390);

        // Product name, word-wrapped.
        $this->wrappedText($image, $boldFont, 22, $name, $titleColor, $cx, 430, $size - 120);

        $path = 'products/'.$slug.'.jpg';
        ob_start();
        imagejpeg($image, null, 90);
        $contents = ob_get_clean();
        imagedestroy($image);

        Storage::disk('public')->put($path, $contents);

        return $path;
    }

    private function centerText($image, string $font, int $size, string $text, int $color, float $cx, float $cy): void
    {
        $box = imagettfbbox($size, 0, $font, $text);
        $width = $box[2] - $box[0];
        $height = $box[1] - $box[7];

        $x = $cx - ($width / 2);
        $y = $cy + ($height / 2);

        imagettftext($image, $size, 0, (int) $x, (int) $y, $color, $font, $text);
    }

    private function wrappedText($image, string $font, int $size, string $text, int $color, float $cx, float $startY, int $maxWidth): void
    {
        $words = explode(' ', $text);
        $lines = [];
        $currentLine = '';

        foreach ($words as $word) {
            $candidate = trim($currentLine.' '.$word);
            $box = imagettfbbox($size, 0, $font, $candidate);
            $width = $box[2] - $box[0];

            if ($width > $maxWidth && $currentLine !== '') {
                $lines[] = $currentLine;
                $currentLine = $word;
            } else {
                $currentLine = $candidate;
            }
        }

        if ($currentLine !== '') {
            $lines[] = $currentLine;
        }

        $lineHeight = $size + 12;

        foreach ($lines as $index => $line) {
            $this->centerText($image, $font, $size, $line, $color, $cx, $startY + ($index * $lineHeight));
        }
    }
}
