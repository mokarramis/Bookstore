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
          ['title' => 'خسیس', 'category' => 'طنز', 'content' => 'کتاب صوتی'],
          ['title' => 'قمپز', 'category' => 'طنز', 'content' => 'کتاب الکترونیکی']
        ];

        foreach($books as $item) {
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
        }

    }
}
