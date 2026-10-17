<?php

namespace App\Modules\Catalog\Infrastructure\Database\Seeders;

use App\Modules\Catalog\Infrastructure\Models\Book;
use App\Modules\Catalog\Infrastructure\Models\BookItem;
use App\Modules\Catalog\Infrastructure\Models\Category;
use App\Modules\Catalog\Infrastructure\Models\Content;
use App\Modules\Catalog\Infrastructure\Models\Publisher;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
          ['title' => 'کتابخانه نیمه شب', 'category' => 'فانتزی', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'کتابخانه نیمه شب', 'category' => 'فانتزی', 'content' => 'کتاب صوتی'],
          ['title' => 'قلعه حیوانات', 'category' => 'فانتزی', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'قلعه حیوانات', 'category' => 'فانتزی', 'content' => 'کتاب صوتی'],
          ['title' => 'شازده کوچولو', 'category' => 'فانتزی', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'شازده کوچولو', 'category' => 'فانتزی', 'content' => 'کتاب صوتی'],
          ['title' => 'پینوکیو', 'category' => 'فانتزی', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'پینوکیو', 'category' => 'فانتزی', 'content' => 'کتاب صوتی'],
          ['title' => 'هرگز رهاین نکن', 'category' => 'فانتزی', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'هرگز رهاین نکن', 'category' => 'فانتزی', 'content' => 'کتاب صوتی'],
          ['title' => 'بادام', 'category' => 'فانتزی', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'بادام', 'category' => 'فانتزی', 'content' => 'کتاب صوتی'],
          ['title' => 'دوزخ', 'category' => 'فانتزی', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'دوزخ', 'category' => 'فانتزی', 'content' => 'کتاب صوتی'],
          ['title' => 'کتابخانه نیمه شب', 'category' => 'فانتزی', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'کتابخانه نیمه شب', 'category' => 'فانتزی', 'content' => 'کتاب صوتی'],
          ['title' => 'هرگز رهایم نکن', 'category' => 'فانتزی', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'من پیش از تو', 'category' => 'عاشقانه', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'من پیش از تو', 'category' => 'عاشقانه', 'content' => 'کتاب صوتی'],
          ['title' => 'شبهای روشن', 'category' => 'عاشقانه', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'شبهای روشن', 'category' => 'عاشقانه', 'content' => 'کتاب صوتی'],
          ['title' => 'آنا کارنینا', 'category' => 'عاشقانه', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'ده قرن عاشقی', 'category' => 'عاشقانه', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'ما تمامش میکنیم', 'category' => 'عاشقانه', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'ما تمامش میکنیم', 'category' => 'عاشقانه', 'content' => 'کتاب صوتی'],
          ['title' => 'و من دوستت دارم', 'category' => 'عاشقانه', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'عقل و احساس', 'category' => 'عاشقانه', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'عقل و احساس', 'category' => 'عاشقانه', 'content' => 'کتاب صوتی'],
          ['title' => 'هنوز هم دوستت دارم', 'category' => 'عاشقانه', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'هزار و یک شب', 'category' => 'عاشقانه', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'هزار و یک شب', 'category' => 'عاشقانه', 'content' => 'کتاب صوتی'],
          ['title' => 'راننده تاکسی', 'category' => 'طنز', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'پخمه', 'category' => 'طنز', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'پخمه', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'بریت', 'category' => 'طنز', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'خسیس', 'category' => 'طنز', 'content' => 'کتاب الکترونیکی'],
          ['title' => 'ماهی', 'category' => 'داستان', 'content' => 'کتاب صوتی'],
          ['title' => 'چنگال', 'category' => 'داستان', 'content' => 'کتاب صوتی'],
          ['title' => 'راننده شب', 'category' => 'داستان', 'content' => 'کتاب صوتی'],
          ['title' => 'ستاره', 'category' => 'داستان', 'content' => 'کتاب صوتی'],
          ['title' => 'مردی به نام اوه', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'شوایک', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'رویای ایتالیایی', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'خر مرده', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'سیندرلا', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'شوایک دهم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'شوایک اول', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'شوایک دوم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'شوایک سوم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'شوایک چهارم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'شوایک پنجم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'شوایک ششم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'شوایک هفتم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'شوایک هشتم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'شوایک نهم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'بازمانده', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'داس و حنده', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'کلوچه محبوب شاه', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'بچه های امروز', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'جشن', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'اشنایی', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'تازه ها', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'دبیر', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'معلم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'شناس', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'ناشناس', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'صد', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'ده', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'بیست', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'سی', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'چهل', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'چنجاه', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'شصت', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'هفتاد', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'هشتاد', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'نود', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'تود و یک', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'نود و دو', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'نود و سه', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'نود و چهار', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'نود و پنج', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'نود و شش', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'نود و هفت', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'نو و هشت', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'نود و نه', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'هزار', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'هزار و یک', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'هزار و صد', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'نمیدانم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'فیک', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'دیتا', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'دارم چه میکنم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'خسته شدم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'چقدر دیتا بزنم؟', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'چرا؟', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'برای چه؟', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'زیرا', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'به فلان دلیل', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'تست هایم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'کتابهایم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'چه کاری بود احه', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'تا کی؟', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'تا کجا؟', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'خسیس 1', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'خسیسی', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'خساست', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'دنیا', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'جهان', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'انسان چه شود آحه', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'تایپم نمیاد', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'بدخط', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'خط خطی', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'زشت', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'کریح', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'یونجه', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'تاوان', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'تلافی', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'تشکر', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'متشکرم', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'تشکرات', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'کرات', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'رختکن بازنده ها', 'category' => 'پادکست', 'content' => 'پادکست'],
          ['title' => 'عصر حجر', 'category' => 'پادکست', 'content' => 'پادکست'],
          ['title' => 'فلسفه علم', 'category' => 'پادکست', 'content' => 'پادکست'],
          ['title' => 'از شنبه', 'category' => 'پادکست', 'content' => 'پادکست'],
          ['title' => 'دغدغه ایران', 'category' => 'پادکست', 'content' => 'پادکست'],
          ['title' => 'اثر پروانه ای', 'category' => 'پادکست', 'content' => 'پادکست'],
          ['title' => 'قمپز', 'category' => 'طنز', 'content' => 'کتاب الکترونیکی']
        ];

        foreach($books as $item) {
          // for($i = 0; $i < 1000000; $i++){
            $category = Category::where('title', $item['category'])->first();
            $content = Content::where('title', $item['content'])->first();
            $publisher = Publisher::inRandomOrder()->first();

            $book = Book::create([
              'title' => $item['title'],
              'description' => $item['title'] . 'توضیحاتی برای کتاب ...',
              'summary' => $item['title'] . 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد. اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. '
            ]);
            $book->categories()->syncWithoutDetaching($category->id);

            BookItem::create([
              'book_id' => $book->id,
              'content_id' => $content ? $content->id : null,
              'publisher_id' => $publisher ? $publisher->id : null,
              'format' => 'epub',
              'price' => rand(50000, 200000),
              'pages' => rand(100, 500), 
            ]);

          // }
        }

    }
}
