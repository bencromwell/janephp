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
    class ContributorActivityWeeksItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
        {
            return $type === \Github\Model\ContributorActivityWeeksItem::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Github\Model\ContributorActivityWeeksItem::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Github\Model\ContributorActivityWeeksItem();
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\ContributorActivityWeeksItemConstraint());
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('w', $data)) {
                $object->setW($data['w']);
                unset($data['w']);
            }
            if (\array_key_exists('a', $data)) {
                $object->setA($data['a']);
                unset($data['a']);
            }
            if (\array_key_exists('d', $data)) {
                $object->setD($data['d']);
                unset($data['d']);
            }
            if (\array_key_exists('c', $data)) {
                $object->setC($data['c']);
                unset($data['c']);
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
            if ($object->isInitialized('w') && null !== $object->getW()) {
                $data['w'] = $object->getW();
            }
            if ($object->isInitialized('a') && null !== $object->getA()) {
                $data['a'] = $object->getA();
            }
            if ($object->isInitialized('d') && null !== $object->getD()) {
                $data['d'] = $object->getD();
            }
            if ($object->isInitialized('c') && null !== $object->getC()) {
                $data['c'] = $object->getC();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\ContributorActivityWeeksItemConstraint());
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Github\Model\ContributorActivityWeeksItem::class => false];
        }
    }
} else {
    class ContributorActivityWeeksItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []): bool
        {
            return $type === \Github\Model\ContributorActivityWeeksItem::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === \Github\Model\ContributorActivityWeeksItem::class;
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
            $object = new \Github\Model\ContributorActivityWeeksItem();
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\ContributorActivityWeeksItemConstraint());
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('w', $data)) {
                $object->setW($data['w']);
                unset($data['w']);
            }
            if (\array_key_exists('a', $data)) {
                $object->setA($data['a']);
                unset($data['a']);
            }
            if (\array_key_exists('d', $data)) {
                $object->setD($data['d']);
                unset($data['d']);
            }
            if (\array_key_exists('c', $data)) {
                $object->setC($data['c']);
                unset($data['c']);
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
            if ($object->isInitialized('w') && null !== $object->getW()) {
                $data['w'] = $object->getW();
            }
            if ($object->isInitialized('a') && null !== $object->getA()) {
                $data['a'] = $object->getA();
            }
            if ($object->isInitialized('d') && null !== $object->getD()) {
                $data['d'] = $object->getD();
            }
            if ($object->isInitialized('c') && null !== $object->getC()) {
                $data['c'] = $object->getC();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            if (!($context['skip_validation'] ?? false)) {
                $this->validate($data, new \Github\Validator\ContributorActivityWeeksItemConstraint());
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null): array
        {
            return [\Github\Model\ContributorActivityWeeksItem::class => false];
        }
    }
}