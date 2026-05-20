<?php

namespace Database\Seeders;

use App\Models\Questions;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuizQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [

                'question' => 'What hook is used to manage state in a React component?',
                'options' => json_encode(['useEffect', 'useState', 'useMemo', 'useRef']),
                'answer' => 'useState',

            ],
            [

                'question' => 'What does JSX stand for?',
                'options' => json_encode(['JavaScript XML', 'Java Syntax XML', 'JSON XML', 'JavaScript Extension']),
                'answer' => 'JavaScript XML',

            ],
            [

                'question' => 'Which hook runs after a component renders?',
                'options' => json_encode(['useMemo', 'useState', 'useEffect', 'useContext']),
                'answer' => 'useEffect',

            ],
            [

                'question' => 'How do you pass data from parent to child in React?',
                'options' => json_encode(['refs', 'props', 'state', 'hooks']),
                'answer' => 'props',

            ],
            [

                'question' => 'Which method is commonly used to render lists in React?',
                'options' => json_encode(['forEach()', 'map()', 'reduce()', 'filter()']),
                'answer' => 'map()',

            ],
            [

                'question' => 'Which hook is used to access context data?',
                'options' => json_encode(['useReducer', 'useMemo', 'useContext', 'useLayoutEffect']),
                'answer' => 'useContext',

            ],
            [

                'question' => 'Which command creates a new Laravel project?',
                'options' => json_encode(['laravel install', 'composer create-project laravel/laravel', 'php artisan new', 'npm create laravel']),
                'answer' => 'composer create-project laravel/laravel',

            ],
            [

                'question' => 'What file stores Laravel environment variables?',
                'options' => json_encode(['config.php', '.env', 'routes.php', 'settings.json']),
                'answer' => '.env',

            ],
            [

                'question' => 'Which Artisan command runs database migrations?',
                'options' => json_encode(['php artisan migrate', 'php artisan db:run', 'php artisan migrate:seed', 'php artisan schema:run']),
                'answer' => 'php artisan migrate',

            ],
            [

                'question' => 'Which Laravel feature protects against CSRF attacks?',
                'options' => json_encode(['Middleware', 'CSRF Token', 'Sanctum', 'Guards']),
                'answer' => 'CSRF Token',
                'category' => 'Laravel Security',
            ],

            // React Questions 11 - 50
            [

                'question' => 'Which hook memoizes a computed value?',
                'options' => json_encode(['useRef', 'useMemo', 'useEffect', 'useState']),
                'answer' => 'useMemo',

            ],
            [

                'question' => 'Which hook memoizes a function?',
                'options' => json_encode(['useMemo', 'useEffect', 'useCallback', 'useReducer']),
                'answer' => 'useCallback',

            ],
            [

                'question' => 'What prop helps React identify list items uniquely?',
                'options' => json_encode(['id', 'name', 'key', 'index']),
                'answer' => 'key',

            ],
            [

                'question' => 'Which hook is useful for mutable references?',
                'options' => json_encode(['useRef', 'useEffect', 'useMemo', 'useState']),
                'answer' => 'useRef',

            ],
            [

                'question' => 'What is the default package manager used with Create React App?',
                'options' => json_encode(['Composer', 'NPM', 'Pip', 'Cargo']),
                'answer' => 'NPM',

            ],
            [

                'question' => 'What hook is used for complex state logic?',
                'options' => json_encode(['useContext', 'useReducer', 'useMemo', 'useEffect']),
                'answer' => 'useReducer',

            ],
            [

                'question' => 'Which library is commonly used for routing in React?',
                'options' => json_encode(['Redux', 'Axios', 'React Router', 'Formik']),
                'answer' => 'React Router',

            ],
            [

                'question' => 'What component is used for navigation in React Router?',
                'options' => json_encode(['Link', 'Route', 'Switch', 'Navigate']),
                'answer' => 'Link',

            ],
            [

                'question' => 'Which hook is used for navigation in React Router v6?',
                'options' => json_encode(['useHistory', 'useNavigate', 'useLocation', 'useRouter']),
                'answer' => 'useNavigate',

            ],
            [

                'question' => 'Which package is commonly used for API requests in React?',
                'options' => json_encode(['Axios', 'Redux', 'Tailwind', 'Zustand']),
                'answer' => 'Axios',

            ],

            // Laravel Questions 51 - 100
            [

                'question' => 'Which command creates a Laravel controller?',
                'options' => json_encode(['php artisan make:controller', 'php artisan create:controller', 'php artisan new:controller', 'php artisan generate:controller']),
                'answer' => 'php artisan make:controller',

            ],
            [

                'question' => 'Which command creates a Laravel model?',
                'options' => json_encode(['php artisan create:model', 'php artisan make:model', 'php artisan model:new', 'php artisan model:create']),
                'answer' => 'php artisan make:model',

            ],
            [

                'question' => 'Which directory contains Laravel routes?',
                'options' => json_encode(['app/', 'routes/', 'config/', 'database/']),
                'answer' => 'routes/',

            ],
            [

                'question' => 'What is the default ORM in Laravel?',
                'options' => json_encode(['Doctrine', 'Sequelize', 'Eloquent', 'Prisma']),
                'answer' => 'Eloquent',

            ],
            [

                'question' => 'Which method retrieves all records in Eloquent?',
                'options' => json_encode(['find()', 'get()', 'all()', 'fetch()']),
                'answer' => 'all()',

            ],
            [

                'question' => 'Which method retrieves a record by ID in Eloquent?',
                'options' => json_encode(['find()', 'all()', 'get()', 'where()']),
                'answer' => 'find()',

            ],
            [

                'question' => 'Which helper generates URLs in Laravel?',
                'options' => json_encode(['route()', 'path()', 'url_to()', 'make_url()']),
                'answer' => 'route()',

            ],
            [

                'question' => 'Which Blade directive is used for loops?',
                'options' => json_encode(['@if', '@loop', '@foreach', '@whileloop']),
                'answer' => '@foreach',

            ],
            [

                'question' => 'Which Blade directive checks conditions?',
                'options' => json_encode(['@if', '@check', '@condition', '@verify']),
                'answer' => '@if',

            ],
            [

                'question' => 'Which middleware verifies authenticated users?',
                'options' => json_encode(['auth', 'guest', 'verified', 'csrf']),
                'answer' => 'auth',

            ],

            // Additional 40 questions
            [

                'question' => 'What command clears Laravel cache?',
                'options' => json_encode(['php artisan cache:clear', 'php artisan clear:cache', 'php artisan optimize', 'php artisan route:clear']),
                'answer' => 'php artisan cache:clear',

            ],
            [

                'question' => 'Which command starts the Laravel development server?',
                'options' => json_encode(['php artisan serve', 'npm run dev', 'php serve', 'composer serve']),
                'answer' => 'php artisan serve',

            ],
            [

                'question' => 'Which React hook updates document titles?',
                'options' => json_encode(['useState', 'useEffect', 'useMemo', 'useRef']),
                'answer' => 'useEffect',

            ],
            [

                'question' => 'What does virtual DOM improve in React?',
                'options' => json_encode(['Security', 'Performance', 'Styling', 'Routing']),
                'answer' => 'Performance',

            ],
            [

                'question' => 'Which React feature prevents unnecessary re-renders?',
                'options' => json_encode(['React.memo', 'React.lazy', 'Suspense', 'StrictMode']),
                'answer' => 'React.memo',

            ],
        ];

        foreach ($questions as $question) {
            Questions::create([
                'uuid'     => Str::uuid(),
                'question' => $question['question'],
                'options'  => $question['options'],
                'answer'   => $question['answer'],
            ]);
        }
    }
}
