<?php

namespace Github\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Github\Runtime\Normalizer\CheckArray;
use Github\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpKernel\Kernel;
if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class ThreadNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \Github\Model\Thread::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Github\Model\Thread::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Github\Model\Thread();
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\ThreadConstraint());
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data)) {
                $object->setId($data['id']);
                unset($data['id']);
            }
            if (\array_key_exists('repository', $data)) {
                $object->setRepository($this->denormalizer->denormalize($data['repository'], \Github\Model\MinimalRepository::class, 'json', $context));
                unset($data['repository']);
            }
            if (\array_key_exists('subject', $data)) {
                $object->setSubject($this->denormalizer->denormalize($data['subject'], \Github\Model\ThreadSubject::class, 'json', $context));
                unset($data['subject']);
            }
            if (\array_key_exists('reason', $data)) {
                $object->setReason($data['reason']);
                unset($data['reason']);
            }
            if (\array_key_exists('unread', $data)) {
                $object->setUnread($data['unread']);
                unset($data['unread']);
            }
            if (\array_key_exists('updated_at', $data)) {
                $object->setUpdatedAt($data['updated_at']);
                unset($data['updated_at']);
            }
            if (\array_key_exists('last_read_at', $data) && $data['last_read_at'] !== null) {
                $object->setLastReadAt($data['last_read_at']);
                unset($data['last_read_at']);
            }
            elseif (\array_key_exists('last_read_at', $data) && $data['last_read_at'] === null) {
                $object->setLastReadAt(null);
            }
            if (\array_key_exists('url', $data)) {
                $object->setUrl($data['url']);
                unset($data['url']);
            }
            if (\array_key_exists('subscription_url', $data)) {
                $object->setSubscriptionUrl($data['subscription_url']);
                unset($data['subscription_url']);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('id') && null !== $object->getId()) {
                $data['id'] = $object->getId();
            }
            if ($object->isInitialized('repository') && null !== $object->getRepository()) {
                $data['repository'] = $this->normalizer->normalize($object->getRepository(), 'json', $context);
            }
            if ($object->isInitialized('subject') && null !== $object->getSubject()) {
                $data['subject'] = $this->normalizer->normalize($object->getSubject(), 'json', $context);
            }
            if ($object->isInitialized('reason') && null !== $object->getReason()) {
                $data['reason'] = $object->getReason();
            }
            if ($object->isInitialized('unread') && null !== $object->getUnread()) {
                $data['unread'] = $object->getUnread();
            }
            if ($object->isInitialized('updatedAt') && null !== $object->getUpdatedAt()) {
                $data['updated_at'] = $object->getUpdatedAt();
            }
            if ($object->isInitialized('lastReadAt') && null !== $object->getLastReadAt()) {
                $data['last_read_at'] = $object->getLastReadAt();
            }
            if ($object->isInitialized('url') && null !== $object->getUrl()) {
                $data['url'] = $object->getUrl();
            }
            if ($object->isInitialized('subscriptionUrl') && null !== $object->getSubscriptionUrl()) {
                $data['subscription_url'] = $object->getSubscriptionUrl();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\ThreadConstraint());
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Github\Model\Thread::class => false];
        }
    }
} else {
    class ThreadNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \Github\Model\Thread::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Github\Model\Thread::class;
        }
        /**
         * @return mixed
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Github\Model\Thread();
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\ThreadConstraint());
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data)) {
                $object->setId($data['id']);
                unset($data['id']);
            }
            if (\array_key_exists('repository', $data)) {
                $object->setRepository($this->denormalizer->denormalize($data['repository'], \Github\Model\MinimalRepository::class, 'json', $context));
                unset($data['repository']);
            }
            if (\array_key_exists('subject', $data)) {
                $object->setSubject($this->denormalizer->denormalize($data['subject'], \Github\Model\ThreadSubject::class, 'json', $context));
                unset($data['subject']);
            }
            if (\array_key_exists('reason', $data)) {
                $object->setReason($data['reason']);
                unset($data['reason']);
            }
            if (\array_key_exists('unread', $data)) {
                $object->setUnread($data['unread']);
                unset($data['unread']);
            }
            if (\array_key_exists('updated_at', $data)) {
                $object->setUpdatedAt($data['updated_at']);
                unset($data['updated_at']);
            }
            if (\array_key_exists('last_read_at', $data) && $data['last_read_at'] !== null) {
                $object->setLastReadAt($data['last_read_at']);
                unset($data['last_read_at']);
            }
            elseif (\array_key_exists('last_read_at', $data) && $data['last_read_at'] === null) {
                $object->setLastReadAt(null);
            }
            if (\array_key_exists('url', $data)) {
                $object->setUrl($data['url']);
                unset($data['url']);
            }
            if (\array_key_exists('subscription_url', $data)) {
                $object->setSubscriptionUrl($data['subscription_url']);
                unset($data['subscription_url']);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('id') && null !== $object->getId()) {
                $data['id'] = $object->getId();
            }
            if ($object->isInitialized('repository') && null !== $object->getRepository()) {
                $data['repository'] = $this->normalizer->normalize($object->getRepository(), 'json', $context);
            }
            if ($object->isInitialized('subject') && null !== $object->getSubject()) {
                $data['subject'] = $this->normalizer->normalize($object->getSubject(), 'json', $context);
            }
            if ($object->isInitialized('reason') && null !== $object->getReason()) {
                $data['reason'] = $object->getReason();
            }
            if ($object->isInitialized('unread') && null !== $object->getUnread()) {
                $data['unread'] = $object->getUnread();
            }
            if ($object->isInitialized('updatedAt') && null !== $object->getUpdatedAt()) {
                $data['updated_at'] = $object->getUpdatedAt();
            }
            if ($object->isInitialized('lastReadAt') && null !== $object->getLastReadAt()) {
                $data['last_read_at'] = $object->getLastReadAt();
            }
            if ($object->isInitialized('url') && null !== $object->getUrl()) {
                $data['url'] = $object->getUrl();
            }
            if ($object->isInitialized('subscriptionUrl') && null !== $object->getSubscriptionUrl()) {
                $data['subscription_url'] = $object->getSubscriptionUrl();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\ThreadConstraint());
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Github\Model\Thread::class => false];
        }
    }
}