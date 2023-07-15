<?php
/**
 * GroupCollectorInterface.php
 * Copyright (c) 2019 james@firefly-iii.org
 *
 * This file is part of Firefly III (https://github.com/firefly-iii).
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace FireflyIII\Helpers\Collector;

use Carbon\Carbon;
use FireflyIII\Models\Bill;
use FireflyIII\Models\Budget;
use FireflyIII\Models\Category;
use FireflyIII\Models\Tag;
use FireflyIII\Models\TransactionCurrency;
use FireflyIII\Models\TransactionGroup;
use FireflyIII\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Interface GroupCollectorInterface
 */
interface GroupCollectorInterface
{
    /**
     * Get transactions with a specific amount.
     *
     * @param string $amount
     *
     * @return GroupCollectorInterface
     */
    public function amountIs(string $amount): GroupCollectorInterface;

    /**
     * @param string $amount
     *
     * @return GroupCollectorInterface
     */
    public function amountIsNot(string $amount): GroupCollectorInterface;

    /**
     * Get transactions where the amount is less than.
     *
     * @param string $amount
     *
     * @return GroupCollectorInterface
     */
    public function amountLess(string $amount): GroupCollectorInterface;

    /**
     * Get transactions where the foreign amount is more than.
     *
     * @param string $amount
     *
     * @return GroupCollectorInterface
     */
    public function amountMore(string $amount): GroupCollectorInterface;

    /**
     * @param string $name
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNameContains(string $name): GroupCollectorInterface;

    /**
     * @param string $name
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNameDoesNotContain(string $name): GroupCollectorInterface;

    /**
     * @param string $name
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNameDoesNotEnd(string $name): GroupCollectorInterface;

    /**
     * @param string $name
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNameDoesNotStart(string $name): GroupCollectorInterface;

    /**
     * @param string $name
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNameEnds(string $name): GroupCollectorInterface;

    /**
     * @param string $name
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNameIs(string $name): GroupCollectorInterface;

    /**
     * @param string $name
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNameIsNot(string $name): GroupCollectorInterface;

    /**
     * @param string $name
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNameStarts(string $name): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNotesAre(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNotesAreNot(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNotesContains(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNotesDoNotContain(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNotesDoNotEnd(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNotesDoNotStart(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNotesEnds(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function attachmentNotesStarts(string $value): GroupCollectorInterface;

    /**
     * @param string $day
     *
     * @return GroupCollectorInterface
     */
    public function dayAfter(string $day): GroupCollectorInterface;

    /**
     * @param string $day
     *
     * @return GroupCollectorInterface
     */
    public function dayBefore(string $day): GroupCollectorInterface;

    /**
     * @param string $day
     *
     * @return GroupCollectorInterface
     */
    public function dayIs(string $day): GroupCollectorInterface;

    /**
     * @param string $day
     *
     * @return GroupCollectorInterface
     */
    public function dayIsNot(string $day): GroupCollectorInterface;

    /**
     * End of the description must not match:
     *
     * @param array $array
     *
     * @return GroupCollectorInterface
     */
    public function descriptionDoesNotEnd(array $array): GroupCollectorInterface;

    /**
     * Beginning of the description must not start with:
     *
     * @param array $array
     *
     * @return GroupCollectorInterface
     */
    public function descriptionDoesNotStart(array $array): GroupCollectorInterface;

    /**
     * End of the description must match:
     *
     * @param array $array
     *
     * @return GroupCollectorInterface
     */
    public function descriptionEnds(array $array): GroupCollectorInterface;

    /**
     * Description must be:
     *
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function descriptionIs(string $value): GroupCollectorInterface;

    /**
     * Description must not be:
     *
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function descriptionIsNot(string $value): GroupCollectorInterface;

    /**
     * Beginning of the description must match:
     *
     * @param array $array
     *
     * @return GroupCollectorInterface
     */
    public function descriptionStarts(array $array): GroupCollectorInterface;

    /**
     * These accounts must not be accounts.
     *
     * @param Collection $accounts
     *
     * @return GroupCollectorInterface
     */
    public function excludeAccounts(Collection $accounts): GroupCollectorInterface;

    /**
     * Exclude a specific set of bills
     *
     * @param Collection $bills
     *
     * @return GroupCollectorInterface
     */
    public function excludeBills(Collection $bills): GroupCollectorInterface;

    /**
     * Exclude a budget
     *
     * @param Budget $budget
     *
     * @return GroupCollectorInterface
     */
    public function excludeBudget(Budget $budget): GroupCollectorInterface;

    /**
     * Exclude a budget.
     *
     * @param Collection $budgets
     *
     * @return GroupCollectorInterface
     */
    public function excludeBudgets(Collection $budgets): GroupCollectorInterface;

    /**
     * Exclude a set of categories.
     *
     * @param Collection $categories
     *
     * @return GroupCollectorInterface
     */
    public function excludeCategories(Collection $categories): GroupCollectorInterface;

    /**
     * Exclude a specific category
     *
     * @param Category $category
     *
     * @return GroupCollectorInterface
     */
    public function excludeCategory(Category $category): GroupCollectorInterface;

    /**
     * Limit results to NOT a specific currency, either foreign or normal one.
     *
     * @param TransactionCurrency $currency
     *
     * @return GroupCollectorInterface
     */
    public function excludeCurrency(TransactionCurrency $currency): GroupCollectorInterface;

    /**
     * Exclude destination accounts.
     *
     * @param Collection $accounts
     *
     * @return GroupCollectorInterface
     */
    public function excludeDestinationAccounts(Collection $accounts): GroupCollectorInterface;

    /**
     * Look for specific external ID's.
     *
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function excludeExternalId(string $externalId): GroupCollectorInterface;

    /**
     * @param string $url
     *
     * @return GroupCollectorInterface
     */
    public function excludeExternalUrl(string $url): GroupCollectorInterface;

    /**
     * Limit results to exclude a specific foreign currency.
     *
     * @param TransactionCurrency $currency
     *
     * @return GroupCollectorInterface
     */
    public function excludeForeignCurrency(TransactionCurrency $currency): GroupCollectorInterface;

    /**
     * Limit the result to NOT a set of specific transaction groups.
     *
     * @param array $groupIds
     *
     * @return GroupCollectorInterface
     */
    public function excludeIds(array $groupIds): GroupCollectorInterface;

    /**
     * Look for specific external ID's.
     *
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function excludeInternalReference(string $externalId): GroupCollectorInterface;

    /**
     * Limit the result to NOT a set of specific transaction journals.
     *
     * @param array $journalIds
     *
     * @return GroupCollectorInterface
     */
    public function excludeJournalIds(array $journalIds): GroupCollectorInterface;

    /**
     * @param Carbon $start
     * @param Carbon $end
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function excludeMetaDateRange(Carbon $start, Carbon $end, string $field): GroupCollectorInterface;

    /**
     * @param Carbon $start
     * @param Carbon $end
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function excludeObjectRange(Carbon $start, Carbon $end, string $field): GroupCollectorInterface;

    /**
     * @param Carbon $start
     * @param Carbon $end
     *
     * @return GroupCollectorInterface
     */
    public function excludeRange(Carbon $start, Carbon $end): GroupCollectorInterface;

    /**
     * @param string $recurringId
     *
     * @return GroupCollectorInterface
     */
    public function excludeRecurrenceId(string $recurringId): GroupCollectorInterface;

    /**
     * Exclude words in descriptions.
     *
     * @param array $array
     *
     * @return GroupCollectorInterface
     */
    public function excludeSearchWords(array $array): GroupCollectorInterface;

    /**
     * These accounts must not be source accounts.
     *
     * @param Collection $accounts
     *
     * @return GroupCollectorInterface
     */
    public function excludeSourceAccounts(Collection $accounts): GroupCollectorInterface;

    /**
     * Limit the included transaction types.
     *
     * @param array $types
     *
     * @return GroupCollectorInterface
     */
    public function excludeTypes(array $types): GroupCollectorInterface;

    /**
     * @return GroupCollectorInterface
     */
    public function exists(): GroupCollectorInterface;

    /**
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function externalIdContains(string $externalId): GroupCollectorInterface;

    /**
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function externalIdDoesNotContain(string $externalId): GroupCollectorInterface;

    /**
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function externalIdDoesNotEnd(string $externalId): GroupCollectorInterface;

    /**
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function externalIdDoesNotStart(string $externalId): GroupCollectorInterface;

    /**
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function externalIdEnds(string $externalId): GroupCollectorInterface;

    /**
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function externalIdStarts(string $externalId): GroupCollectorInterface;

    /**
     * @param string $url
     *
     * @return GroupCollectorInterface
     */
    public function externalUrlContains(string $url): GroupCollectorInterface;

    /**
     * @param string $url
     *
     * @return GroupCollectorInterface
     */
    public function externalUrlDoesNotContain(string $url): GroupCollectorInterface;

    /**
     * @param string $url
     *
     * @return GroupCollectorInterface
     */
    public function externalUrlDoesNotEnd(string $url): GroupCollectorInterface;

    /**
     * @param string $url
     *
     * @return GroupCollectorInterface
     */
    public function externalUrlDoesNotStart(string $url): GroupCollectorInterface;

    /**
     * @param string $url
     *
     * @return GroupCollectorInterface
     */
    public function externalUrlEnds(string $url): GroupCollectorInterface;

    /**
     * @param string $url
     *
     * @return GroupCollectorInterface
     */
    public function externalUrlStarts(string $url): GroupCollectorInterface;

    /**
     * Ensure the search will find nothing at all, zero results.
     *
     * @return GroupCollectorInterface
     */
    public function findNothing(): GroupCollectorInterface;

    /**
     * Get transactions with a specific foreign amount.
     *
     * @param string $amount
     *
     * @return GroupCollectorInterface
     */
    public function foreignAmountIs(string $amount): GroupCollectorInterface;

    /**
     * Get transactions with a specific foreign amount.
     *
     * @param string $amount
     *
     * @return GroupCollectorInterface
     */
    public function foreignAmountIsNot(string $amount): GroupCollectorInterface;

    /**
     * Get transactions where the amount is less than.
     *
     * @param string $amount
     *
     * @return GroupCollectorInterface
     */
    public function foreignAmountLess(string $amount): GroupCollectorInterface;

    /**
     * Get transactions where the foreign amount is more than.
     *
     * @param string $amount
     *
     * @return GroupCollectorInterface
     */
    public function foreignAmountMore(string $amount): GroupCollectorInterface;

    /**
     * Return the transaction journals without group information. Is useful in some instances.
     *
     * @return array
     */
    public function getExtractedJournals(): array;

    /**
     * Return the groups.
     *
     * @return Collection
     */
    public function getGroups(): Collection;

    /**
     * Same as getGroups but everything is in a paginator.
     *
     * @return LengthAwarePaginator
     */
    public function getPaginatedGroups(): LengthAwarePaginator;

    /**
     * @return GroupCollectorInterface
     */
    public function hasAnyTag(): GroupCollectorInterface;

    /**
     * Has attachments
     *
     * @return GroupCollectorInterface
     */
    public function hasAttachments(): GroupCollectorInterface;

    /**
     * Has no attachments
     *
     * @return GroupCollectorInterface
     */
    public function hasNoAttachments(): GroupCollectorInterface;

    /**
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function internalReferenceContains(string $externalId): GroupCollectorInterface;

    /**
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function internalReferenceDoesNotContain(string $externalId): GroupCollectorInterface;

    /**
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function internalReferenceDoesNotEnd(string $externalId): GroupCollectorInterface;

    /**
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function internalReferenceDoesNotStart(string $externalId): GroupCollectorInterface;

    /**
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function internalReferenceEnds(string $externalId): GroupCollectorInterface;

    /**
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function internalReferenceStarts(string $externalId): GroupCollectorInterface;

    /**
     * Only journals that are reconciled.
     *
     * @return GroupCollectorInterface
     */
    public function isNotReconciled(): GroupCollectorInterface;

    /**
     * Only journals that are reconciled.
     *
     * @return GroupCollectorInterface
     */
    public function isReconciled(): GroupCollectorInterface;

    /**
     * @param string $day
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function metaDayAfter(string $day, string $field): GroupCollectorInterface;

    /**
     * @param string $day
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function metaDayBefore(string $day, string $field): GroupCollectorInterface;

    /**
     * @param string $day
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function metaDayIs(string $day, string $field): GroupCollectorInterface;

    /**
     * @param string $day
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function metaDayIsNot(string $day, string $field): GroupCollectorInterface;

    /**
     * @param string $month
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function metaMonthAfter(string $month, string $field): GroupCollectorInterface;

    /**
     * @param string $month
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function metaMonthBefore(string $month, string $field): GroupCollectorInterface;

    /**
     * @param string $month
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function metaMonthIs(string $month, string $field): GroupCollectorInterface;

    /**
     * @param string $month
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function metaMonthIsNot(string $month, string $field): GroupCollectorInterface;

    /**
     * @param string $year
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function metaYearAfter(string $year, string $field): GroupCollectorInterface;

    /**
     * @param string $year
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function metaYearBefore(string $year, string $field): GroupCollectorInterface;

    /**
     * @param string $year
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function metaYearIs(string $year, string $field): GroupCollectorInterface;

    /**
     * @param string $year
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function metaYearIsNot(string $year, string $field): GroupCollectorInterface;

    /**
     * @param string $month
     *
     * @return GroupCollectorInterface
     */
    public function monthAfter(string $month): GroupCollectorInterface;

    /**
     * @param string $month
     *
     * @return GroupCollectorInterface
     */
    public function monthBefore(string $month): GroupCollectorInterface;

    /**
     * @param string $month
     *
     * @return GroupCollectorInterface
     */
    public function monthIs(string $month): GroupCollectorInterface;

    /**
     * @param string $month
     *
     * @return GroupCollectorInterface
     */
    public function monthIsNot(string $month): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function notesContain(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function notesDoNotContain(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function notesDontEndWith(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function notesDontStartWith(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function notesEndWith(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function notesExactly(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function notesExactlyNot(string $value): GroupCollectorInterface;

    /**
     * @param string $value
     *
     * @return GroupCollectorInterface
     */
    public function notesStartWith(string $value): GroupCollectorInterface;

    /**
     * @param string $day
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function objectDayAfter(string $day, string $field): GroupCollectorInterface;

    /**
     * @param string $day
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function objectDayBefore(string $day, string $field): GroupCollectorInterface;

    /**
     * @param string $day
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function objectDayIs(string $day, string $field): GroupCollectorInterface;

    /**
     * @param string $day
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function objectDayIsNot(string $day, string $field): GroupCollectorInterface;

    /**
     * @param string $month
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function objectMonthAfter(string $month, string $field): GroupCollectorInterface;

    /**
     * @param string $month
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function objectMonthBefore(string $month, string $field): GroupCollectorInterface;

    /**
     * @param string $month
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function objectMonthIs(string $month, string $field): GroupCollectorInterface;

    /**
     * @param string $month
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function objectMonthIsNot(string $month, string $field): GroupCollectorInterface;

    /**
     * @param string $year
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function objectYearAfter(string $year, string $field): GroupCollectorInterface;

    /**
     * @param string $year
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function objectYearBefore(string $year, string $field): GroupCollectorInterface;

    /**
     * @param string $year
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function objectYearIs(string $year, string $field): GroupCollectorInterface;

    /**
     * @param string $year
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function objectYearIsNot(string $year, string $field): GroupCollectorInterface;

    /**
     * Define which accounts can be part of the source and destination transactions.
     *
     * @param Collection $accounts
     *
     * @return GroupCollectorInterface
     */
    public function setAccounts(Collection $accounts): GroupCollectorInterface;

    /**
     * Collect transactions after a specific date.
     *
     * @param Carbon $date
     *
     * @return GroupCollectorInterface
     */
    public function setAfter(Carbon $date): GroupCollectorInterface;

    /**
     * Collect transactions before a specific date.
     *
     * @param Carbon $date
     *
     * @return GroupCollectorInterface
     */
    public function setBefore(Carbon $date): GroupCollectorInterface;

    /**
     * Limit the search to a specific bill.
     *
     * @param Bill $bill
     *
     * @return GroupCollectorInterface
     */
    public function setBill(Bill $bill): GroupCollectorInterface;

    /**
     * Limit the search to a specific set of bills.
     *
     * @param Collection $bills
     *
     * @return GroupCollectorInterface
     */
    public function setBills(Collection $bills): GroupCollectorInterface;

    /**
     * Both source AND destination must be in this list of accounts.
     *
     * @param Collection $accounts
     *
     * @return GroupCollectorInterface
     */
    public function setBothAccounts(Collection $accounts): GroupCollectorInterface;

    /**
     * Limit the search to a specific budget.
     *
     * @param Budget $budget
     *
     * @return GroupCollectorInterface
     */
    public function setBudget(Budget $budget): GroupCollectorInterface;

    /**
     * Limit the search to a specific set of budgets.
     *
     * @param Collection $budgets
     *
     * @return GroupCollectorInterface
     */
    public function setBudgets(Collection $budgets): GroupCollectorInterface;

    /**
     * Limit the search to a specific bunch of categories.
     *
     * @param Collection $categories
     *
     * @return GroupCollectorInterface
     */
    public function setCategories(Collection $categories): GroupCollectorInterface;

    /**
     * Limit the search to a specific category.
     *
     * @param Category $category
     *
     * @return GroupCollectorInterface
     */
    public function setCategory(Category $category): GroupCollectorInterface;

    /**
     * Collect transactions created on a specific date.
     *
     * @param Carbon $date
     *
     * @return GroupCollectorInterface
     */
    public function setCreatedAt(Carbon $date): GroupCollectorInterface;

    /**
     * Limit results to a specific currency, either foreign or normal one.
     *
     * @param TransactionCurrency $currency
     *
     * @return GroupCollectorInterface
     */
    public function setCurrency(TransactionCurrency $currency): GroupCollectorInterface;

    /**
     * Set destination accounts.
     *
     * @param Collection $accounts
     *
     * @return GroupCollectorInterface
     */
    public function setDestinationAccounts(Collection $accounts): GroupCollectorInterface;

    /**
     * Look for specific external ID's.
     *
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function setExternalId(string $externalId): GroupCollectorInterface;

    /**
     * @param string $url
     *
     * @return GroupCollectorInterface
     */
    public function setExternalUrl(string $url): GroupCollectorInterface;

    /**
     * Limit results to a specific foreign currency.
     *
     * @param TransactionCurrency $currency
     *
     * @return GroupCollectorInterface
     */
    public function setForeignCurrency(TransactionCurrency $currency): GroupCollectorInterface;

    /**
     * Limit the result to a set of specific transaction groups.
     *
     * @param array $groupIds
     *
     * @return GroupCollectorInterface
     */
    public function setIds(array $groupIds): GroupCollectorInterface;

    /**
     * Look for specific external ID's.
     *
     * @param string $externalId
     *
     * @return GroupCollectorInterface
     */
    public function setInternalReference(string $externalId): GroupCollectorInterface;

    /**
     * Limit the result to a set of specific transaction journals.
     *
     * @param array $journalIds
     *
     * @return GroupCollectorInterface
     */
    public function setJournalIds(array $journalIds): GroupCollectorInterface;

    /**
     * Limit the number of returned entries.
     *
     * @param int $limit
     *
     * @return GroupCollectorInterface
     */
    public function setLimit(int $limit): GroupCollectorInterface;

    /**
     * Collect transactions after a specific date.
     *
     * @param Carbon $date
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function setMetaAfter(Carbon $date, string $field): GroupCollectorInterface;

    /**
     * Collect transactions before a specific date.
     *
     * @param Carbon $date
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function setMetaBefore(Carbon $date, string $field): GroupCollectorInterface;

    /**
     * Set the start and end time of the results to return, based on meta data.
     *
     * @param Carbon $start
     * @param Carbon $end
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function setMetaDateRange(Carbon $start, Carbon $end, string $field): GroupCollectorInterface;

    /**
     * Define which accounts can NOT be part of the source and destination transactions.
     *
     * @param Collection $accounts
     *
     * @return GroupCollectorInterface
     */
    public function setNotAccounts(Collection $accounts): GroupCollectorInterface;

    /**
     * @param Carbon $date
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function setObjectAfter(Carbon $date, string $field): GroupCollectorInterface;

    /**
     * @param Carbon $date
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function setObjectBefore(Carbon $date, string $field): GroupCollectorInterface;

    /**
     * @param Carbon $start
     * @param Carbon $end
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function setObjectRange(Carbon $start, Carbon $end, string $field): GroupCollectorInterface;

    /**
     * Set the page to get.
     *
     * @param int $page
     *
     * @return GroupCollectorInterface
     */
    public function setPage(int $page): GroupCollectorInterface;

    /**
     * Set the start and end time of the results to return.
     *
     * @param Carbon $start
     * @param Carbon $end
     *
     * @return GroupCollectorInterface
     */
    public function setRange(Carbon $start, Carbon $end): GroupCollectorInterface;

    /**
     * Look for specific recurring ID's.
     *
     * @param string $recurringId
     *
     * @return GroupCollectorInterface
     */
    public function setRecurrenceId(string $recurringId): GroupCollectorInterface;

    /**
     * Search for words in descriptions.
     *
     * @param array $array
     *
     * @return GroupCollectorInterface
     */
    public function setSearchWords(array $array): GroupCollectorInterface;

    /**
     * @param string $sepaCT
     *
     * @return GroupCollectorInterface
     */
    public function setSepaCT(string $sepaCT): GroupCollectorInterface;

    /**
     * Set source accounts.
     *
     * @param Collection $accounts
     *
     * @return GroupCollectorInterface
     */
    public function setSourceAccounts(Collection $accounts): GroupCollectorInterface;

    /**
     * Limit results to a specific tag.
     *
     * @param Tag $tag
     *
     * @return GroupCollectorInterface
     */
    public function setTag(Tag $tag): GroupCollectorInterface;

    /**
     * Limit results to a specific set of tags.
     *
     * @param Collection $tags
     *
     * @return GroupCollectorInterface
     */
    public function setTags(Collection $tags): GroupCollectorInterface;

    /**
     * Limit the search to one specific transaction group.
     *
     * @param TransactionGroup $transactionGroup
     *
     * @return GroupCollectorInterface
     */
    public function setTransactionGroup(TransactionGroup $transactionGroup): GroupCollectorInterface;

    /**
     * Limit the included transaction types.
     *
     * @param array $types
     *
     * @return GroupCollectorInterface
     */
    public function setTypes(array $types): GroupCollectorInterface;

    /**
     * Collect transactions updated on a specific date.
     *
     * @param Carbon $date
     *
     * @return GroupCollectorInterface
     */
    public function setUpdatedAt(Carbon $date): GroupCollectorInterface;

    /**
     * Set the user object and start the query.
     *
     * @param User $user
     *
     * @return GroupCollectorInterface
     */
    public function setUser(User $user): GroupCollectorInterface;

    /**
     * Only when does not have these tags
     *
     * @param Collection $tags
     *
     * @return GroupCollectorInterface
     */
    public function setWithoutSpecificTags(Collection $tags): GroupCollectorInterface;

    /**
     * Either account can be set, but NOT both. This effectively excludes internal transfers.
     *
     * @param Collection $accounts
     *
     * @return GroupCollectorInterface
     */
    public function setXorAccounts(Collection $accounts): GroupCollectorInterface;

    /**
     * Automatically include all stuff required to make API calls work.
     *
     * @return GroupCollectorInterface
     */
    public function withAPIInformation(): GroupCollectorInterface;

    /**
     * Will include the source and destination account names and types.
     *
     * @return GroupCollectorInterface
     */
    public function withAccountInformation(): GroupCollectorInterface;

    /**
     * Any notes, no matter what.
     *
     * @return GroupCollectorInterface
     */
    public function withAnyNotes(): GroupCollectorInterface;

    /**
     * Add basic info on attachments of transactions.
     *
     * @return GroupCollectorInterface
     */
    public function withAttachmentInformation(): GroupCollectorInterface;

    /**
     * Limit results to transactions without a bill..
     *
     * @return GroupCollectorInterface
     */
    public function withBill(): GroupCollectorInterface;

    /**
     * Include bill name + ID.
     *
     * @return GroupCollectorInterface
     */
    public function withBillInformation(): GroupCollectorInterface;

    /**
     * Limit results to a transactions with a budget.
     *
     * @return GroupCollectorInterface
     */
    public function withBudget(): GroupCollectorInterface;

    /**
     * Will include budget ID + name, if any.
     *
     * @return GroupCollectorInterface
     */
    public function withBudgetInformation(): GroupCollectorInterface;

    /**
     * Limit results to a transactions with a category.
     *
     * @return GroupCollectorInterface
     */
    public function withCategory(): GroupCollectorInterface;

    /**
     * Will include category ID + name, if any.
     *
     * @return GroupCollectorInterface
     */
    public function withCategoryInformation(): GroupCollectorInterface;

    /**
     * Transactions with any external ID
     *
     * @return GroupCollectorInterface
     */
    public function withExternalId(): GroupCollectorInterface;

    /**
     * Transactions with any external URL
     *
     * @return GroupCollectorInterface
     */
    public function withExternalUrl(): GroupCollectorInterface;

    /**
     * Transaction must have meta date field X.
     *
     * @param string $field
     *
     * @return GroupCollectorInterface
     */
    public function withMetaDate(string $field): GroupCollectorInterface;

    /**
     * Will include notes.
     *
     * @return GroupCollectorInterface
     */
    public function withNotes(): GroupCollectorInterface;

    /**
     * Add tag info.
     *
     * @return GroupCollectorInterface
     */
    public function withTagInformation(): GroupCollectorInterface;

    /**
     * Limit results to a transactions without a bill.
     *
     * @return GroupCollectorInterface
     */
    public function withoutBill(): GroupCollectorInterface;

    /**
     * Limit results to a transactions without a budget.
     *
     * @return GroupCollectorInterface
     */
    public function withoutBudget(): GroupCollectorInterface;

    /**
     * Limit results to a transactions without a category.
     *
     * @return GroupCollectorInterface
     */
    public function withoutCategory(): GroupCollectorInterface;

    /**
     * Transactions without an external ID
     *
     * @return GroupCollectorInterface
     */
    public function withoutExternalId(): GroupCollectorInterface;

    /**
     * Transactions without an external URL
     *
     * @return GroupCollectorInterface
     */
    public function withoutExternalUrl(): GroupCollectorInterface;

    /**
     * @return GroupCollectorInterface
     */
    public function withoutNotes(): GroupCollectorInterface;

    /**
     * @return GroupCollectorInterface
     */
    public function withoutTags(): GroupCollectorInterface;

    /**
     * @param string $year
     *
     * @return GroupCollectorInterface
     */
    public function yearAfter(string $year): GroupCollectorInterface;

    /**
     * @param string $year
     *
     * @return GroupCollectorInterface
     */
    public function yearBefore(string $year): GroupCollectorInterface;

    /**
     * @param string $year
     *
     * @return GroupCollectorInterface
     */
    public function yearIs(string $year): GroupCollectorInterface;

    /**
     * @param string $year
     *
     * @return GroupCollectorInterface
     */
    public function yearIsNot(string $year): GroupCollectorInterface;
}
