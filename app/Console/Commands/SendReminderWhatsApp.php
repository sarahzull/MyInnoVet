<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Appointment;
use App\Services\TwilioService;
use Illuminate\Console\Command;

class SendReminderWhatsApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:whatsapp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder WhatsApp messages to users a week and a day before their appointment';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(TwilioService $twilioService)
    {
        $appointments = Appointment::with(['patient', 'staffs', 'slots', 'slots.slotDetails'])->get();

        foreach ($appointments as $appointment) {

            // Check if the appointment is tomorrow.
            $tomorrow = now()->addDays(1)->format('Y-m-d');
            $slotDate = $appointment->slots->date->format('Y-m-d');

            if ($slotDate == $tomorrow) {
                $ownerName = $appointment->patient->owner->name;
                $petName = $appointment->patient->name;
                $slotDate = $appointment->slots->date->format('d F Y');
                $slotTime = $appointment->slots->slotDetails->description;
            
                $bodyMessage = "Hello *$ownerName*,\n\n";
                $bodyMessage .= "We would like to remind you of your pet *$petName* upcoming appointment.\n";
                $bodyMessage .= "Your appointment details:\n\n";
                $bodyMessage .= "*Date: $slotDate*\n";
                $bodyMessage .= "*Time: $slotTime*\n\n";
                $bodyMessage .= "Thank you for choosing MyInnoVet for your veterinary services.";

                $twilioService->sendWhatsAppMessage($bodyMessage);
            }

            // Check if the appointment is due before or a week before today's date.
            $slotDate = $appointment->slots->date->format('Y-m-d');
            $dueDate = now()->addWeeks(-1)->format('Y-m-d');

            if ($slotDate == $dueDate) {
                $ownerName = $appointment->patient->owner->name;
                $petName = $appointment->patient->name;
                $slotDate = $appointment->slots->date->format('d F Y');
                $slotTime = $appointment->slots->slotDetails->description;
            
                $bodyMessage = "Hello *$ownerName*,\n\n";
                $bodyMessage .= "We would like to remind you of your pet *$petName* upcoming appointment.\n";
                $bodyMessage .= "Your appointment details:\n\n";
                $bodyMessage .= "*Date: $slotDate*\n";
                $bodyMessage .= "*Time: $slotTime*\n\n";
                $bodyMessage .= "Thank you for choosing MyInnoVet for your veterinary services.";

                $twilioService->sendWhatsAppMessage($bodyMessage);
            }
        }

        $this->info('Reminder WhatsApp messages sent successfully.');
        return Command::SUCCESS;
    }
}
