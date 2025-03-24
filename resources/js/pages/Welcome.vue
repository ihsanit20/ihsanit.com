<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>

    <!-- Hero Section -->
    <section class="bg-gray-100 py-20 text-center">
        <div class="container mx-auto px-4">
            <h1 class="mb-4 text-4xl font-bold text-gray-800">আপনার ব্যবসার জন্য আধুনিক সফটওয়্যার সল্যুশন</h1>
            <p class="mb-6 text-lg text-gray-600">Ihsan IT – বিশ্বস্ত SaaS প্রযুক্তি পার্টনার</p>
            <div class="space-x-4">
                <Link href="/products" class="rounded-xl bg-blue-600 px-6 py-3 text-white shadow">আমাদের প্রোডাক্ট দেখুন</Link>
                <Link href="/pricing" class="rounded-xl bg-gray-200 px-6 py-3 text-gray-800">ডেমো রিকোয়েস্ট করুন</Link>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="mb-10 text-3xl font-semibold text-gray-800">কেন Ihsan IT?</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-4">
                <div>
                    <div class="mb-4 text-5xl">🇧🇩</div>
                    <h3 class="mb-2 text-lg font-bold">বাংলা ভাষায় সফটওয়্যার</h3>
                    <p class="text-sm text-gray-600">সম্পূর্ণ ইউজার ইন্টারফেস বাংলায়।</p>
                </div>
                <div>
                    <div class="mb-4 text-5xl">☁️</div>
                    <h3 class="mb-2 text-lg font-bold">ক্লাউড ভিত্তিক</h3>
                    <p class="text-sm text-gray-600">যেকোনো স্থান থেকে অ্যাক্সেস করুন।</p>
                </div>
                <div>
                    <div class="mb-4 text-5xl">🔒</div>
                    <h3 class="mb-2 text-lg font-bold">নিরাপত্তা</h3>
                    <p class="text-sm text-gray-600">আপনার ডাটা আমাদের সর্বোচ্চ অগ্রাধিকার।</p>
                </div>
                <div>
                    <div class="mb-4 text-5xl">🛠</div>
                    <h3 class="mb-2 text-lg font-bold">কাস্টমাইজযোগ্য</h3>
                    <p class="text-sm text-gray-600">আপনার প্রয়োজন অনুযায়ী ফিচার অ্যাড করুন।</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Products -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="mb-10 text-3xl font-semibold text-gray-800">আমাদের SaaS প্রোডাক্টস</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-2xl bg-white p-6 shadow">
                    <h3 class="mb-2 text-xl font-bold">🎓 LMS</h3>
                    <p class="text-sm text-gray-600">অনলাইন - অফলাইন সম্পূর্ণ লার্নিং সল্যুশন।</p>
                </div>
                <div class="rounded-2xl bg-white p-6 shadow">
                    <h3 class="mb-2 text-xl font-bold">🏫 Madrasah Management</h3>
                    <p class="text-sm text-gray-600">মাদ্রাসা পরিচালনার জন্য আধুনিক সফটওয়্যার।</p>
                </div>
                <div class="rounded-2xl bg-white p-6 shadow">
                    <h3 class="mb-2 text-xl font-bold">🛒 E-commerce</h3>
                    <p class="text-sm text-gray-600">স্টক ম্যানেজমেন্টসহ অনলাইন ব্যবসার জন্য।</p>
                </div>
                <div class="rounded-2xl bg-white p-6 shadow">
                    <h3 class="mb-2 text-xl font-bold">📝 Board Exam Management</h3>
                    <p class="text-sm text-gray-600">অনলাইন পরীক্ষার সম্পূর্ণ সমাধান।</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-blue-600 py-16 text-center text-white">
        <div class="container mx-auto px-4">
            <h2 class="mb-4 text-3xl font-bold">আপনার প্রতিষ্ঠানের জন্য একটি স্মার্ট সফটওয়্যার তৈরি করুন</h2>
            <p class="mb-6">আজই আমাদের সাথে যোগাযোগ করুন অথবা ডেমো রিকোয়েস্ট করুন।</p>
            <Link href="/contact" class="rounded-xl bg-white px-6 py-3 font-semibold text-blue-600">যোগাযোগ করুন</Link>
        </div>
    </section>
</template>
