<?php


namespace App\Security;


use App\Entity\Usuario;
use App\Entity\Incidencia;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class IncidenciaVoter extends Voter
{
    const VIEW = 'view';
    const EDIT = 'edit';

    /**
     * Determines if the attribute and subject are supported by this voter.
     *
     * @param string $attribute An attribute
     * @param mixed $subject The subject to secure, e.g. an object the user wants to access or any other PHP type
     *
     * @return bool True if the attribute and subject are supported, false otherwise
     */
    protected function supports($attribute, $subject)
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, [self::VIEW, self::EDIT])) {
            return false;
        }

        // only vote on Post objects inside this voter
        if (!$subject instanceof Incidencia) {
            return false;
        }

        return true;
    }

    /**
     * Perform a single access check operation on a given attribute, subject and token.
     * It is safe to assume that $attribute and $subject already passed the "supports()" method check.
     *
     * @param string $attribute
     * @param mixed $subject
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof Usuario) {
            // El usuario debe estar logeado, sino se deniega
            return false;
        }

        /** @var Incidencia $incidencia */
        $incidencia = $subject;

        switch ($attribute) {
            case self::VIEW:
                return $this->canView($incidencia, $user);
            case self::EDIT:
                return $this->canEdit($incidencia, $user);
        }
    }

    private function canView(Incidencia $incidencia, Usuario $user)
    {
        // if they can edit, they can view
        if ($this->canEdit($incidencia, $user)) {
            return true;
        }

        //return !$incidencia->isPrivate();
        return false;
    }

    private function canEdit(Incidencia $incidencia, Usuario $user)
    {
        return $user->getId() === $incidencia->getComercial();
    }
}