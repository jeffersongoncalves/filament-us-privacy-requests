<?php

namespace JeffersonGoncalves\Filament\UsPrivacyRequests;

use Filament\Panel;
use Illuminate\Database\Eloquent\Model;
use JeffersonGoncalves\Filament\UsPrivacyRequests\Resources\ConsumerRequests\ConsumerRequestResource;
use JeffersonGoncalves\FilamentPluginCore\BasePlugin;
use JeffersonGoncalves\UsPrivacy\UsPrivacy;

class UsPrivacyRequestsPlugin extends BasePlugin
{
    protected ?string $navigationGroup = null;

    protected ?int $navigationSort = null;

    protected string $navigationIcon = 'heroicon-o-shield-check';

    protected string $slug = 'data-subject-requests';

    /** @var list<class-string<Model>>|null */
    protected ?array $subjectModels = null;

    public function getId(): string
    {
        return 'filament-us-privacy-requests';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            ConsumerRequestResource::class,
        ]);
    }

    public function navigationGroup(?string $group): static
    {
        $this->navigationGroup = $group;

        return $this;
    }

    public function getNavigationGroup(): ?string
    {
        return $this->navigationGroup;
    }

    public function navigationSort(?int $sort): static
    {
        $this->navigationSort = $sort;

        return $this;
    }

    public function getNavigationSort(): ?int
    {
        return $this->navigationSort;
    }

    public function navigationIcon(string $icon): static
    {
        $this->navigationIcon = $icon;

        return $this;
    }

    public function getNavigationIcon(): string
    {
        return $this->navigationIcon;
    }

    public function slug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Models a request can be linked to when verifying the requester. Defaults to laravel-us-privacy's `us-privacy.models`.
     *
     * @param  list<class-string<Model>>  $models
     */
    public function subjectModels(array $models): static
    {
        $this->subjectModels = $models;

        return $this;
    }

    /**
     * @return list<class-string<Model>>
     */
    public function getSubjectModels(): array
    {
        return $this->subjectModels ?? app(UsPrivacy::class)->models();
    }
}
