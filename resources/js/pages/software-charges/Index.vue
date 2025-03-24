<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const props = defineProps<{
    softwareCharges: SoftwareCharge[];
}>();

const data = ref<SoftwareCharge[]>(props.softwareCharges);

interface SoftwareCharge {
    id: number;
    website: string;
    month: string;
    paid_amount: number;
    trx_id: string;
    paid_at: string;
}
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex-1 rounded-xl p-4">
            <div class="max-w-[100vw] overflow-x-auto">
                <table class="w-full min-w-max table-auto text-left text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-center">SL</th>
                            <th class="px-4 py-2 text-center">Website</th>
                            <th class="px-4 py-2 text-center">Month</th>
                            <th class="px-4 py-2 text-right">Amount</th>
                            <th class="px-4 py-2 text-center">TrxID</th>
                            <th class="px-4 py-2 text-center">Paid At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in data" :key="item.id" class="border-t">
                            <td class="px-4 py-2 text-center">{{ index + 1 }}</td>
                            <td class="px-4 py-2 text-center">{{ item.website }}</td>
                            <td class="px-4 py-2 text-center">
                                {{ new Date(item.month).toLocaleString('default', { month: 'long', year: 'numeric' }) }}
                            </td>
                            <td class="px-4 py-2 text-right">{{ Number(item.paid_amount).toFixed(2) }}</td>
                            <td class="px-4 py-2 text-center">{{ item.trx_id }}</td>
                            <td class="px-4 py-2 text-center">
                                {{ item.paid_at }}
                            </td>
                        </tr>
                        <tr v-if="data.length === 0">
                            <td colspan="5" class="px-4 py-4 text-center text-muted-foreground">No data available.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
