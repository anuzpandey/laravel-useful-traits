<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

trait SetFlashMessage
{
    protected array $errorMessages = [];

    protected array $successMessages = [];

    protected array $infoMessages = [];

    protected array $warningMessages = [];

    /**
     * In the setter function, we're running the switch statement on $type and setting the right property based on type.
     * we are checking if the $message is in array format if yes, then we are pushing all values from the array to our array property.
     * If it is a single message then simply pushing the message to our property.
     */
    public function setFlashMessage($message, $type): void
    {
        $model = 'infoMessages';

        switch ($type) {
            case 'info':

                $model = 'infoMessages';

                break;
            case 'error':

                $model = 'errorMessages';

                break;
            case 'success':

                $model = 'successMessages';

                break;
            case 'warning':

                $model = 'warningMessages';

                break;
        }

        if (is_array($message)) {
            foreach ($message as $key => $value) {
                $this->{$model}[] = $value;
            }
        } else {
            $this->{$model}[] = $message;
        }
    }

    /**
     * Return an array of all flash messages properties.
     */
    public function getFlashMessage(): array
    {
        return [
            'error' => $this->errorMessages,
            'info' => $this->infoMessages,
            'success' => $this->successMessages,
            'warning' => $this->warningMessages,
        ];
    }

    /**
     * Flushing flash messages to Laravel session
     */
    public function showFlashMessages(): void
    {
        session()->flash('error', $this->errorMessages);
        session()->flash('info', $this->infoMessages);
        session()->flash('success', $this->successMessages);
        session()->flash('warning', $this->warningMessages);
    }
}
